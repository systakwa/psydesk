<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
#[Assert\Callback('validatePauseTimes')]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "Le psychologue est obligatoire")]
    private ?Users $psychologue = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: "Le jour est obligatoire")]
    #[Assert\Choice(
        choices: ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'],
        message: "Jour invalide"
    )]
    private string $jour;

    #[ORM\Column(type: 'time')]
    #[Assert\NotNull(message: "Heure de début obligatoire")]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: 'time')]
    #[Assert\NotNull(message: "Heure de fin obligatoire")]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\Column(type: 'time', nullable: true)]
    #[Assert\NotNull(message: "Heure de pauseDebut obligatoire")]
    private ?\DateTimeInterface $pauseDebut = null;

    #[ORM\Column(type: 'time', nullable: true)]
    #[Assert\NotNull(message: "Heure de pauseFin obligatoire")]
    private ?\DateTimeInterface $pauseFin = null;

    #[ORM\Column]
    #[Assert\Positive(message: "La durée doit être positive")]
    #[Assert\Range(
        min: 10,
        max: 120,
        notInRangeMessage: "Durée entre 10 et 120 minutes"
    )]
    private int $duree = 20;

    // ================= GETTERS / SETTERS =================

    public function getId(): ?int { return $this->id; }

    public function getPsychologue(): ?Users { return $this->psychologue; }
    public function setPsychologue(?Users $psychologue): static { $this->psychologue = $psychologue; return $this; }

    public function getJour(): string { return $this->jour; }
    public function setJour(string $jour): static { $this->jour = $jour; return $this; }

    public function getHeureDebut(): ?\DateTimeInterface { return $this->heureDebut; }
    public function setHeureDebut(\DateTimeInterface $heureDebut): static { $this->heureDebut = $heureDebut; return $this; }

    public function getHeureFin(): ?\DateTimeInterface { return $this->heureFin; }
    public function setHeureFin(\DateTimeInterface $heureFin): static { $this->heureFin = $heureFin; return $this; }

    public function getPauseDebut(): ?\DateTimeInterface { return $this->pauseDebut; }
    public function setPauseDebut(?\DateTimeInterface $pauseDebut): static { $this->pauseDebut = $pauseDebut; return $this; }

    public function getPauseFin(): ?\DateTimeInterface { return $this->pauseFin; }
    public function setPauseFin(?\DateTimeInterface $pauseFin): static { $this->pauseFin = $pauseFin; return $this; }

    public function getDuree(): int { return $this->duree; }
    public function setDuree(int $duree): static { $this->duree = $duree; return $this; }

    /**
     * Validate time constraints
     */
    public function validatePauseTimes(\Symfony\Component\Validator\Context\ExecutionContextInterface $context): void
    {
        // Check if heureDebut < heureFin
        if ($this->heureDebut && $this->heureFin && $this->heureDebut >= $this->heureFin) {
            $context->buildViolation('L\'heure de début doit être avant l\'heure de fin')
                ->atPath('heureDebut')
                ->addViolation();
        }

        // Check if pause times are between heure inicio and fin
        if ($this->pauseDebut && $this->pauseFin) {
            if ($this->heureDebut && $this->pauseDebut < $this->heureDebut) {
                $context->buildViolation('La pause doit démarrer après l\'heure de début')
                    ->atPath('pauseDebut')
                    ->addViolation();
            }
            if ($this->heureFin && $this->pauseFin > $this->heureFin) {
                $context->buildViolation('La pause doit finir avant l\'heure de fin')
                    ->atPath('pauseFin')
                    ->addViolation();
            }
            if ($this->pauseDebut >= $this->pauseFin) {
                $context->buildViolation('La pause de début doit être avant la fin de pause')
                    ->atPath('pauseDebut')
                    ->addViolation();
            }
        }
    }
}