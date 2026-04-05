<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    // Correction : targetEntity = Users::class (majuscule) + JoinColumn avec le vrai nom de la colonne
    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'reclamations')]
    #[ORM\JoinColumn(name: 'idPatient', referencedColumnName: 'id')]  // ← adaptez 'id_patient' si nécessaire
    private ?Users $idPatient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getIdPatient(): ?Users
    {
        return $this->idPatient;
    }

    public function setIdPatient(?Users $idPatient): static
    {
        $this->idPatient = $idPatient;
        return $this;
    }
}