<?php

namespace App\Entity;

use App\Repository\ObjectifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ObjectifRepository::class)]
class Objectif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La description est obligatoire.")]
    #[Assert\Length(
        max: 100,
        maxMessage: "La description ne doit pas dépasser {{ limit }} caractères."
    )]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: "La date de fin est obligatoire.")]
    #[Assert\GreaterThanOrEqual(
        value: "today",
        message: "La date de fin doit être supérieure ou égale à la date d'aujourd'hui."
    )]
    private ?\DateTime $datefin = null;

    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    #[ORM\Column(nullable: true)]
    private ?int $nb_note = null;

    #[ORM\Column(nullable: true)]
    private ?int $nb_jour = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?bool $etat = null;

    /**
     * @var Collection<int, Notejour>
     */
    #[ORM\OneToMany(targetEntity: Notejour::class, mappedBy: 'idObjectif')]
    private Collection $notejours;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'objectifs')]
    #[ORM\JoinColumn(name: 'idPatient', referencedColumnName: 'id', nullable: false)]
    private ?Users $idPatient = null;

    public function __construct()
    {
        $this->notejours = new ArrayCollection();
         $this->created_at = new \DateTime(); // add this
    }

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

    public function getDatefin(): ?\DateTime
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTime $datefin): static
    {
        $this->datefin = $datefin;
        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getNbNote(): ?int
    {
        return $this->nb_note;
    }

    public function setNbNote(?int $nb_note): static
    {
        $this->nb_note = $nb_note;
        return $this;
    }

    public function getNbJour(): ?int
    {
        return $this->nb_jour;
    }

    public function setNbJour(?int $nb_jour): static
    {
        $this->nb_jour = $nb_jour;
        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): static
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function isEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(?bool $etat): static
    {
        $this->etat = $etat;
        return $this;
    }

    /**
     * @return Collection<int, Notejour>
     */
    public function getNotejours(): Collection
    {
        return $this->notejours;
    }

    public function addNotejour(Notejour $notejour): static
    {
        if (!$this->notejours->contains($notejour)) {
            $this->notejours->add($notejour);
            $notejour->setIdObjectif($this);
        }
        return $this;
    }

    public function removeNotejour(Notejour $notejour): static
    {
        if ($this->notejours->removeElement($notejour)) {
            if ($notejour->getIdObjectif() === $this) {
                $notejour->setIdObjectif(null);
            }
        }
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