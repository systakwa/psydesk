<?php

namespace App\Service;

use App\Entity\Objectif;
use App\Repository\ObjectifRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ObjectiveEvaluationService
{
    private ObjectifRepository $objectifRepository;
    private HttpClientInterface $httpClient;
    private ?string $apiUrl;
    private ?string $apiKey;
    private bool $aiEnabled;

    public function __construct(ObjectifRepository $objectifRepository, HttpClientInterface $httpClient)
    {
        $this->objectifRepository = $objectifRepository;
        $this->httpClient = $httpClient;
        $this->apiUrl = $_ENV['AI_API_URL'] ?? '';
        $this->apiKey = $_ENV['AI_API_KEY'] ?? '';
        $this->aiEnabled = filter_var($_ENV['AI_ENABLED'] ?? '0', FILTER_VALIDATE_BOOLEAN);
    }

    public function evaluate(Objectif $objectif): array
    {
        $stats = $this->objectifRepository->getAverageSatisfaction($objectif->getId());
        $average = $stats['average'];
        $count = $stats['count'];

        $description = $this->mapScoreToDescription($average);
        $status = $this->determineStatus($average);
        $summary = $status ? 'Objectif probablement réussi' : 'Objectif probablement non atteint';
        $recommendations = $this->mapScoreToRecommendations($average);

        $payload = [
            'objective' => $objectif->getDescription(),
            'average' => $average,
            'count' => $count,
            'description' => $description,
            'status' => $status,
            'summary' => $summary,
            'recommendations' => $recommendations,
        ];

        $aiResponse = null;
        // Only call external AI API when URL is configured and AI is enabled.
        if ($this->apiUrl && $this->aiEnabled) {
            try {
                $headers = ['Content-Type' => 'application/json'];
                if ($this->apiKey) {
                    $headers['Authorization'] = 'Bearer ' . $this->apiKey;
                }

                $prompt = $this->buildPrompt($payload);

                // Support provider-specific payloads. If the API URL contains "groq",
                // send payload under an `input` key (common for Groq-style endpoints).
                if (stripos($this->apiUrl, 'groq') !== false) {
                    $json = [
                        'input' => [
                            'prompt' => $prompt,
                            'meta' => $payload,
                        ],
                    ];
                } else {
                    $json = [
                        'prompt' => $prompt,
                        'meta' => $payload,
                    ];
                }

                $response = $this->httpClient->request('POST', $this->apiUrl, [
                    'json' => $json,
                    'headers' => $headers,
                ]);

                $content = $response->getContent();
                $aiResponse = json_decode($content, true);
            } catch (\Throwable $e) {
                $aiResponse = ['error' => $e->getMessage()];
            }
        }

        return [
            'average' => $average,
            'count' => $count,
            'description' => $description,
            'status' => $status,
            'summary' => $summary,
            'recommendations' => $recommendations,
            'ai' => $aiResponse,
        ];
    }

    private function determineStatus(?float $avg): bool
    {
        if ($avg === null) {
            return false;
        }
        return $avg >= 7.0;
    }

    private function mapScoreToRecommendations(?float $avg): array
    {
        if ($avg === null) {
            return ['Collecter plus de notes pour évaluer l\'objectif.'];
        }
        $score = round($avg, 1);
        if ($score <= 3) {
            return [
                'Réévaluer l\'objectif avec le patient.',
                'Augmenter la fréquence du suivi et proposer des interventions concrètes.',
                'Envisager un accompagnement psychologique rapproché.'
            ];
        }
        if ($score <= 6) {
            return [
                'Renforcer le soutien et revoir les stratégies actuelles.',
                'Fixer des étapes intermédiaires plus courtes.',
                'Encourager les accomplissements et suivre les progrès régulièrement.'
            ];
        }
        if ($score <= 8) {
            return [
                'Consolider les acquis et maintenir les bonnes pratiques.',
                'Prévoir des rendez-vous d\'entretien moins fréquents mais réguliers.',
                'Valoriser les progrès réalisés.'
            ];
        }
        return [
            'Objectif atteint : envisager un nouvel objectif ou une montée en charge.',
            'Fêter la réussite et planifier la maintenance des acquis.',
        ];
    }

    private function mapScoreToDescription(?float $avg): string
    {
        if ($avg === null) {
            return 'Aucune note disponible';
        }
        $score = round($avg, 1);
        if ($score <= 3) {
            return "Faible (0-3) — le patient semble insatisfait, des interventions immédiates sont recommandées.";
        }
        if ($score <= 6) {
            return "Moyen (4-6) — progrès limité, réévaluer l'approche et renforcer le soutien.";
        }
        if ($score <= 8) {
            return "Bon (7-8) — objectif en bonne voie, poursuivre les efforts et consolider.";
        }
        return "Excellent (9-10) — objectif atteint ou proche de l'être, envisager de fixer un nouvel objectif.";
    }

    private function buildPrompt(array $payload): string
    {
        $avg = $payload['average'] ?? 'N/A';
        $count = $payload['count'] ?? 0;
        $objective = $payload['objective'] ?? '';
        $desc = $payload['description'] ?? '';

        return "Tu es un assistant psychologique spécialisé. Évalue si l'objectif suivant est réussi ou non selon la moyenne de satisfaction et donne des conseils concis:\nObjective: $objective\nMoyenne: $avg (sur $count notes)\nInterprétation: $desc\nRéponse en français, court, 2-4 recommandations pratiques.";
    }
}
