<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: "Contenu obligatoire")]
    #[Assert\Length(min: 5)]
    #[ORM\Column(type: 'text')]
    private ?string $contenu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $video_url = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = "en_attente";

    #[ORM\Column]
    private ?\DateTimeImmutable $date_post = null;

    #[Assert\Email]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_email = null;

    public function __construct()
    {
        $this->date_post = new \DateTimeImmutable();
    }

    // getters setters

    public function getId(): ?int { return $this->id; }

    public function getContenu(): ?string { return $this->contenu; }
    public function setContenu(string $c): self { $this->contenu = $c; return $this; }

    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $i): self { $this->image = $i; return $this; }

    public function getVideoUrl(): ?string { return $this->video_url; }
    public function setVideoUrl(?string $v): self { $this->video_url = $v; return $this; }

    public function getStatut(): ?string { return $this->statut; }
    public function setStatut(string $s): self { $this->statut = $s; return $this; }

    public function getDatePost(): ?\DateTimeImmutable { return $this->date_post; }

    public function getUserEmail(): ?string { return $this->user_email; }
    public function setUserEmail(?string $e): self { $this->user_email = $e; return $this; }
}