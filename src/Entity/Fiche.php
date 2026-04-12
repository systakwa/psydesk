<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Fiche
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

    #[ORM\ManyToOne(targetEntity: Reservation::class)]
    #[ORM\JoinColumn(name: "id_reservation", referencedColumnName: "id", nullable: false)]
    #[Assert\NotNull(message: "Réservation obligatoire")]
    private ?Reservation $reservation = null;

    #[ORM\Column(type: "text", nullable: true)]
    #[Assert\NotBlank(message: "Contenu obligatoire")]
    #[Assert\Length(min: 5, minMessage: "Texte trop court")]
    private ?string $texteFiche = null;

    #[ORM\Column(type: "date")]
    #[Assert\NotNull(message: "Date obligatoire")]
    private ?\DateTimeInterface $date = null;

    public function __construct()
    {
        $this->date = new \DateTime('today');
    }

    // GETTERS / SETTERS

    public function getId(): ?int { return $this->id; }

    public function getPatient(): ?Users { return $this->patient; }
    public function setPatient(?Users $patient): self { $this->patient = $patient; return $this; }

    public function getPsychologue(): ?Users { return $this->psychologue; }
    public function setPsychologue(?Users $psychologue): self { $this->psychologue = $psychologue; return $this; }

    public function getReservation(): ?Reservation { return $this->reservation; }
    public function setReservation(?Reservation $reservation): self { $this->reservation = $reservation; return $this; }

    // Legacy ID getters for backward compatibility
    public function getIdPatient(): ?int { return $this->patient?->getId(); }
    public function setIdPatient(int $idPatient): self { return $this; } // Unused with new relationship

    public function getIdPsychologue(): ?int { return $this->psychologue?->getId(); }
    public function setIdPsychologue(int $idPsychologue): self { return $this; } // Unused with new relationship

    public function getIdReservation(): ?int { return $this->reservation?->getId(); }
    public function setIdReservation(int $idReservation): self { return $this; } // Unused with new relationship

    public function getTexteFiche(): ?string { return $this->texteFiche; }
    public function setTexteFiche(?string $texteFiche): self { $this->texteFiche = $texteFiche; return $this; }

    public function getDate(): ?\DateTimeInterface { return $this->date; }
    public function setDate(\DateTimeInterface $date): self { $this->date = $date; return $this; }
}