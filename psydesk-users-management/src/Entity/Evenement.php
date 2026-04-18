<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: "Titre obligatoire")]
    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[Assert\NotBlank]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[Assert\NotBlank]
    #[Assert\GreaterThan("today", message: "Date لازم تكون في المستقبل")]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEvent = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = "en_attente";
#[ORM\Column(length: 255, nullable: true)]
private ?string $meetLink = null;

public function getMeetLink(): ?string
{
    return $this->meetLink;
}

public function setMeetLink(?string $meetLink): self
{
    $this->meetLink = $meetLink;
    return $this;
}
#[ORM\Column(length: 255, nullable: true)]
private ?string $image = null;

public function getImage(): ?string
{
    return $this->image;
}

public function setImage(?string $image): self
{
    $this->image = $image;
    return $this;
}
    // 🔗 relation avec Participation
   #[ORM\OneToMany(mappedBy: 'evenement', targetEntity: Participation::class, orphanRemoval: true)]
private Collection $participations;


    public function __construct()
    {
        $this->participations = new ArrayCollection();
    }

    // getters / setters
public function getNombreParticipants(): int
{
    return $this->participations->count();
}
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;
        return $this;
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

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->dateEvent;
    }

    public function setDateEvent(\DateTimeInterface $dateEvent): static
    {
        $this->dateEvent = $dateEvent;
        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    // 🔗 participations

    public function getParticipations(): Collection
    {
        return $this->participations;
    }
    
}