<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $date_prevue = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $date_dispo = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?User $psychologue = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?User $patient = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePrevue(): ?\DateTime
    {
        return $this->date_prevue;
    }

    public function setDatePrevue(\DateTime $date_prevue): static
    {
        $this->date_prevue = $date_prevue;

        return $this;
    }

    public function getDateDispo(): ?\DateTime
    {
        return $this->date_dispo;
    }

    public function setDateDispo(?\DateTime $date_dispo): static
    {
        $this->date_dispo = $date_dispo;

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

    public function getPatient(): ?User
    {
        return $this->patient;
    }

    public function setPatient(?User $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    #[ORM\OneToOne(mappedBy: 'reservation', targetEntity: Fiche::class, cascade: ['persist', 'remove'])]
private ?Fiche $fiche = null;

// Getter
public function getFiche(): ?Fiche
{
    return $this->fiche;
}

// Setter
public function setFiche(Fiche $fiche): self
{
    // set the owning side of the relation if necessary
    if ($fiche->getReservation() !== $this) {
        $fiche->setReservation($this);
    }

    $this->fiche = $fiche;

    return $this;
}
}
