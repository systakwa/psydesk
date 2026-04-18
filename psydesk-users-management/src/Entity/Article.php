<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
    use App\Entity\Users;
    use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Like;
use App\Entity\Commentaire;



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

  // ❤️ LIKES (DANS LA CLASSE)
    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Like::class, orphanRemoval: true)]
    private Collection $likes;

    // 💬 COMMENTAIRES (DANS LA CLASSE)
    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Commentaire::class, orphanRemoval: true)]
    private Collection $commentaires;


#[ORM\ManyToOne(targetEntity: Users::class)]
#[ORM\JoinColumn(nullable: true)]
private ?Users $user = null;
    public function __construct()
    {
      $this->date_post = new \DateTimeImmutable();
        $this->likes = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
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

   public function getUser(): ?Users
{
    return $this->user;
}

public function setUser(?Users $user): self
{
    $this->user = $user;
    return $this;
}
 

    
   
    public function getLikes(): Collection { return $this->likes; }

    public function getCommentaires(): Collection { return $this->commentaires; }
}
