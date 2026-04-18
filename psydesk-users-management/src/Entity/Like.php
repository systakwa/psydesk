<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Article;
use App\Entity\Users;

#[ORM\Entity]
#[ORM\Table(name: "likes")]
#[ORM\UniqueConstraint(columns: ["article_id", "user_id"])]
class Like
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Article $article = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Users $user = null;

    // getters setters

    public function getId(): ?int { return $this->id; }

    public function getArticle(): ?Article { return $this->article; }
    public function setArticle(?Article $article): self { $this->article = $article; return $this; }

    public function getUser(): ?Users { return $this->user; }
    public function setUser(?Users $user): self { $this->user = $user; return $this; }
}