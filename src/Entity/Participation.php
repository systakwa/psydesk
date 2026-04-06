<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $nomParticipant = null;

    #[Assert\NotBlank]
    #[Assert\Email]
    #[ORM\Column(length: 255)]
    private ?string $emailParticipant = null;

    // 🔗 relation correcte
    #[ORM\ManyToOne(targetEntity: Evenement::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $evenement;

    // getters / setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomParticipant(): ?string
    {
        return $this->nomParticipant;
    }
public function __toString(): string
{
    return $this->titre;
}
    public function setNomParticipant(string $nomParticipant): static
    {
        $this->nomParticipant = $nomParticipant;
        return $this;
    }

    public function getEmailParticipant(): ?string
    {
        return $this->emailParticipant;
    }

    public function setEmailParticipant(string $emailParticipant): static
    {
        $this->emailParticipant = $emailParticipant;
        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): static
    {
        $this->evenement = $evenement;
        return $this;
    }
}