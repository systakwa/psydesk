<?php

namespace App\Entity;

use App\Repository\DisponibiliteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DisponibiliteRepository::class)]
class Disponibilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "Psychologue obligatoire")]
    private ?Users $psychologue = null;

    #[ORM\ManyToOne(targetEntity: Planning::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Planning $planning = null;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotNull(message: "Date/heure obligatoire")]
    private ?\DateTimeInterface $dateHeure = null;

    #[ORM\Column]
    private bool $isReserved = false;

    // ================= GETTERS / SETTERS =================

    public function getId(): ?int { return $this->id; }

    public function getPsychologue(): ?Users { return $this->psychologue; }
    public function setPsychologue(?Users $psychologue): static { $this->psychologue = $psychologue; return $this; }

    public function getPlanning(): ?Planning { return $this->planning; }
    public function setPlanning(?Planning $planning): static { $this->planning = $planning; return $this; }

    public function getDateHeure(): ?\DateTimeInterface { return $this->dateHeure; }
    public function setDateHeure(\DateTimeInterface $dateHeure): static { $this->dateHeure = $dateHeure; return $this; }

    public function isReserved(): bool { return $this->isReserved; }
    public function setIsReserved(bool $isReserved): static { $this->isReserved = $isReserved; return $this; }
}