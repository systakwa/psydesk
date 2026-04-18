<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Article;
use App\Entity\Users;

#[ORM\Entity]
#[ORM\Table(name: "commentaire")]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "text")]
    private ?string $contenu = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Article $article = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user = null;

    public function __construct()
    {
        $this->date = new \DateTimeImmutable();
    }

    // getters setters

    public function getId(): ?int { return $this->id; }

    public function getContenu(): ?string { return $this->contenu; }
    public function setContenu(string $contenu): self { $this->contenu = $contenu; return $this; }

    public function getDate(): ?\DateTimeImmutable { return $this->date; }

    public function getArticle(): ?Article { return $this->article; }
    public function setArticle(?Article $article): self { $this->article = $article; return $this; }

    public function getUser(): ?Users { return $this->user; }
    public function setUser(?Users $user): self { $this->user = $user; return $this; }
}