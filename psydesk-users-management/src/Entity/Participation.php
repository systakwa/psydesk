<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Users;
use App\Entity\Evenement;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // 🔗 relation User
    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user = null;

    // 🔗 relation Evenement
    #[ORM\ManyToOne(targetEntity: Evenement::class, inversedBy: 'participations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Evenement $evenement = null;

    // getters / setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): self
    {
        $this->evenement = $evenement;
        return $this;
    }
}