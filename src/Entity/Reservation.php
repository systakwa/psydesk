<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(name: "id_patient", referencedColumnName: "id", nullable: false)]
    #[Assert\NotNull(message: "Patient obligatoire")]
    private ?Users $patient = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(name: "id_psychologue", referencedColumnName: "id", nullable: false)]
    #[Assert\NotNull(message: "Psychologue obligatoire")]
    private ?Users $psychologue = null;

    #[ORM\Column(type: "datetime")]
    #[Assert\NotBlank(message: "Date prévue obligatoire")]
    private ?\DateTimeInterface $datePrevue = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTimeInterface $dateDispo = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Statut obligatoire")]
    #[Assert\Choice(choices: ['en attente', 'confirmé', 'annulé'], message: "Statut invalide")]
    private string $status = 'en attente';

    // GETTERS / SETTERS

    public function getId(): ?int { return $this->id; }

    public function getPatient(): ?Users { return $this->patient; }
    public function setPatient(?Users $patient): self { $this->patient = $patient; return $this; }

    public function getPsychologue(): ?Users { return $this->psychologue; }
    public function setPsychologue(?Users $psychologue): self { $this->psychologue = $psychologue; return $this; }

    // Legacy ID getters for backward compatibility
    public function getIdPatient(): ?int { return $this->patient?->getId(); }
    public function setIdPatient(int $idPatient): self { return $this; }

    public function getIdPsychologue(): ?int { return $this->psychologue?->getId(); }
    public function setIdPsychologue(int $idPsychologue): self { return $this; }

    public function getDatePrevue(): ?\DateTimeInterface { return $this->datePrevue; }
    public function setDatePrevue(\DateTimeInterface $datePrevue): self { $this->datePrevue = $datePrevue; return $this; }

    public function getDateDispo(): ?\DateTimeInterface { return $this->dateDispo; }
    public function setDateDispo(?\DateTimeInterface $dateDispo): self { $this->dateDispo = $dateDispo; return $this; }

    public function getStatus(): string { return $this->status; }
    public function setStatus(string $status): self { $this->status = $status; return $this; }
}