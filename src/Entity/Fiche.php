<?php

namespace App\Entity;

use App\Repository\FicheRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheRepository::class)]
class Fiche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?User $patient = null;

    #[ORM\ManyToOne]
    private ?User $psychologue = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Reservation $reservation = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $texteFiche = null;

    #[ORM\Column]
    private ?\DateTime $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?User
    {
        return $this->patient;
    }

    public function setPatient(?User $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getPsychologue(): ?User
    {
        return $this->psychologue;
    }

    public function setPsychologue(?User $psychologue): static
    {
        $this->psychologue = $psychologue;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): static
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getTexteFiche(): ?string
    {
        return $this->texteFiche;
    }

    public function setTexteFiche(?string $texteFiche): static
    {
        $this->texteFiche = $texteFiche;

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
}
