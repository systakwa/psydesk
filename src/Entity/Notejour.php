<?php

namespace App\Entity;

use App\Repository\NotejourRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotejourRepository::class)]
class Notejour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Objectif::class, inversedBy: 'notejours')]
    #[ORM\JoinColumn(name: 'idObjectif', referencedColumnName: 'id', nullable: false)]
    private ?Objectif $idObjectif = null;

    #[ORM\Column(type: Types::TEXT, name: 'texteNote')]
    private ?string $texteNote = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(nullable: true, options: ['default' => 0])]
    private ?bool $evaluation = null;

    
    #[ORM\Column(nullable: true, options: ['default' => 0])]
    private ?int $satisfer = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdObjectif(): ?Objectif
    {
        return $this->idObjectif;
    }

    public function setIdObjectif(?Objectif $idObjectif): static
    {
        $this->idObjectif = $idObjectif;
        return $this;
    }

    public function getTexteNote(): ?string
    {
        return $this->texteNote;
    }

    public function setTexteNote(string $texteNote): static
    {
        $this->texteNote = $texteNote;
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

    public function isEvaluation(): ?bool
    {
        return $this->evaluation;
    }

    public function setEvaluation(?bool $evaluation): static
    {
        $this->evaluation = $evaluation;
        return $this;
    }

    public function getSatisfer(): ?int
    {
        return $this->satisfer;
    }

    public function setSatisfer(?int $satisfer): static
    {
        $this->satisfer = $satisfer;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;
        return $this;
    }
}