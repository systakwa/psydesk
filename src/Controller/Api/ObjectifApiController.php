<?php

namespace App\Controller\Api;

use App\Entity\Objectif;
use App\Repository\NotejourRepository;
use App\Service\ObjectiveEvaluationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/objectifs')]
final class ObjectifApiController extends AbstractController
{
    #[Route('/{id}/notes', name: 'api_objectif_notes', methods: ['GET'])]
    public function notes(int $id, Request $request, EntityManagerInterface $entityManager, NotejourRepository $notejourRepository): Response
    {
        $objectif = $entityManager->getRepository(Objectif::class)->find($id);
        if (!$objectif) {
            // return JSON or HTML not found depending on accept
            if (str_contains($request->headers->get('Accept', ''), 'text/html')) {
                return new Response('Objectif not found', 404);
            }
            return new JsonResponse(['error' => 'Objectif not found'], 404);
        }

        $notejours = $notejourRepository->findBy(['idObjectif' => $objectif], ['date' => 'DESC']);
        // If client prefers HTML (e.g., scanning QR opens in browser), render a simple HTML page
        $accept = $request->headers->get('Accept', '');
        if (str_contains($accept, 'text/html')) {
            return $this->render('api/objectif_notes.html.twig', [
                'objectif' => $objectif,
                'notejours' => $notejours,
            ]);
        }

        $data = [];
        foreach ($notejours as $n) {
            $data[] = [
                'id' => $n->getId(),
                'texteNote' => $n->getTexteNote(),
                'date' => $n->getDate() ? $n->getDate()->format('Y-m-d') : null,
                'evaluation' => $n->isEvaluation(),
                'satisfer' => $n->getSatisfer(),
                'createdAt' => $n->getCreatedAt() ? $n->getCreatedAt()->format(DATE_ATOM) : null,
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}/evaluate', name: 'api_objectif_evaluate', methods: ['GET'])]
    public function evaluate(int $id, Request $request, EntityManagerInterface $entityManager, ObjectiveEvaluationService $evaluationService): Response
    {
        $objectif = $entityManager->getRepository(Objectif::class)->find($id);
        if (!$objectif) {
            if (str_contains($request->headers->get('Accept', ''), 'text/html')) {
                return new Response('Objectif not found', 404);
            }
            return new JsonResponse(['error' => 'Objectif not found'], 404);
        }

        $result = $evaluationService->evaluate($objectif);

        // If query param json=1 is provided, always return JSON.
        $wantJson = $request->query->get('json');
        if ($wantJson === '1' || $wantJson === 'true') {
            return new JsonResponse($result);
        }

        $accept = $request->headers->get('Accept', '');
        if (str_contains($accept, 'text/html')) {
            return $this->render('api/objectif_evaluate.html.twig', [
                'objectif' => $objectif,
                'result' => $result,
            ]);
        }

        return new JsonResponse($result);
    }
}
