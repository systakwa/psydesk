<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: '`users`')]
#[UniqueEntity(fields: ['email'], message: 'Cette adresse email est déjà utilisée')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_PSYCHOLOGUE = 'ROLE_PSYCHOLOGUE';
    const ROLE_PATIENT = 'ROLE_PATIENT';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom est obligatoire')]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: 'Le nom doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-ZÀ-ÿ\s\-]+$/',
        message: 'Le nom ne peut contenir que des lettres, des espaces et des tirets'
    )]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le prénom est obligatoire')]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: 'Le prénom doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Le prénom ne peut pas dépasser {{ limit }} caractères'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-ZÀ-ÿ\s\-]+$/',
        message: 'Le prénom ne peut contenir que des lettres, des espaces et des tirets'
    )]
    private ?string $prenom = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'L\'âge est obligatoire')]
    #[Assert\Type(
        type: 'integer',
        message: 'L\'âge doit être un nombre entier'
    )]
    #[Assert\Range(
        min: 0,
        max: 120,
        notInRangeMessage: 'L\'âge doit être compris entre {{ min }} et {{ max }} ans'
    )]
    #[Assert\PositiveOrZero(message: 'L\'âge ne peut pas être négatif')]
    private ?int $age = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: 'L\'email est obligatoire')]
    #[Assert\Email(
        message: 'L\'email {{ value }} n\'est pas valide',
        mode: 'html5'
    )]
    #[Assert\Length(
        max: 180,
        maxMessage: 'L\'email ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $email = null;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $googleId = null;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $image = null;
    
    // ✅ AJOUT DU CHAMP faceToken POUR LA RECONNAISSANCE FACIALE
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $faceToken = null;
    
    // ✅ AJOUT DES CHAMPS DE BANNISSEMENT
    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private bool $isEnabled = true;
    
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $bannedAt = null;
    
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $banReason = null;
    
    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le rôle est obligatoire')]
    #[Assert\Choice(
        choices: [self::ROLE_ADMIN, self::ROLE_PSYCHOLOGUE, self::ROLE_PATIENT],
        multiple: true,
        message: 'Choisissez un rôle valide'
    )]
    private array $role = [];

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le mot de passe est obligatoire', groups: ['registration'])]
    #[Assert\Length(
        min: 8,
        max: 255,
        minMessage: 'Le mot de passe doit contenir au moins {{ limit }} caractères',
        groups: ['registration']
    )]
    #[Assert\Regex(
        pattern: '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/',
        message: 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial',
        groups: ['registration']
    )]
    private ?string $password = null;

    /**
     * @var Collection<int, Objectif>
     */
    #[ORM\OneToMany(targetEntity: Objectif::class, mappedBy: 'idPatient')]
    private Collection $objectifs;

    /**
     * @var Collection<int, Reclamation>
     */
    #[ORM\OneToMany(targetEntity: Reclamation::class, mappedBy: 'idPatient')]
    private Collection $reclamations;

    public function __construct()
    {
        $this->role = [self::ROLE_PATIENT];
        $this->objectifs = new ArrayCollection();
        $this->reclamations = new ArrayCollection();
        $this->isEnabled = true; // Par défaut, l'utilisateur est actif
    }

    public function getId(): ?int 
    { 
        return $this->id; 
    }
    
    public function getNom(): ?string 
    { 
        return $this->nom; 
    }
    
    public function setNom(string $nom): static 
    { 
        $this->nom = $nom; 
        return $this; 
    }
    
    public function getPrenom(): ?string 
    { 
        return $this->prenom; 
    }
    
    public function setPrenom(string $prenom): static 
    { 
        $this->prenom = $prenom; 
        return $this; 
    }
    
    public function getAge(): ?int 
    { 
        return $this->age; 
    }
    
    public function setAge(int $age): static 
    { 
        $this->age = $age; 
        return $this; 
    }
    
    public function getEmail(): ?string 
    { 
        return $this->email; 
    }
    
    public function setEmail(string $email): static 
    { 
        $this->email = $email; 
        return $this; 
    }
    
    public function getGoogleId(): ?string 
    { 
        return $this->googleId; 
    }
    
    public function setGoogleId(?string $googleId): static 
    { 
        $this->googleId = $googleId; 
        return $this; 
    }
    
    public function getImage(): ?string 
    { 
        return $this->image; 
    }
    
    public function setImage(?string $image): static 
    { 
        $this->image = $image; 
        return $this; 
    }
    
    // ✅ GETTER ET SETTER POUR faceToken
    public function getFaceToken(): ?string
    {
        return $this->faceToken;
    }
    
    public function setFaceToken(?string $faceToken): static
    {
        $this->faceToken = $faceToken;
        return $this;
    }
    
    // ✅ GETTERS ET SETTERS POUR LE BANNISSEMENT
    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }
    
    public function setIsEnabled(bool $isEnabled): static
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }
    
    public function getBannedAt(): ?\DateTimeInterface
    {
        return $this->bannedAt;
    }
    
    public function setBannedAt(?\DateTimeInterface $bannedAt): static
    {
        $this->bannedAt = $bannedAt;
        return $this;
    }
    
    public function getBanReason(): ?string
    {
        return $this->banReason;
    }
    
    public function setBanReason(?string $banReason): static
    {
        $this->banReason = $banReason;
        return $this;
    }
    
    public function isBanned(): bool
    {
        return !$this->isEnabled;
    }
    
    public function getUserIdentifier(): string 
    { 
        return (string) $this->email; 
    }
    
    public function getRoles(): array 
    { 
        return array_unique($this->role); 
    }
    
    public function setRoles(array $role): static 
    { 
        $this->role = $role; 
        return $this; 
    }
    
    public function getPassword(): ?string 
    { 
        return $this->password; 
    }
    
    public function setPassword(string $password): static 
    { 
        $this->password = $password; 
        return $this; 
    }
    
    public function eraseCredentials(): void {}
    
    public function getFullName(): string 
    { 
        return $this->prenom . ' ' . $this->nom; 
    }

    public function getObjectifs(): Collection
    {
        return $this->objectifs;
    }

    public function addObjectif(Objectif $objectif): static
    {
        if (!$this->objectifs->contains($objectif)) {
            $this->objectifs->add($objectif);
            $objectif->setIdPatient($this);
        }
        return $this;
    }

    public function removeObjectif(Objectif $objectif): static
    {
        if ($this->objectifs->removeElement($objectif)) {
            if ($objectif->getIdPatient() === $this) {
                $objectif->setIdPatient(null);
            }
        }
        return $this;
    }

    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): static
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations->add($reclamation);
            $reclamation->setIdPatient($this);
        }
        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): static
    {
        if ($this->reclamations->removeElement($reclamation)) {
            if ($reclamation->getIdPatient() === $this) {
                $reclamation->setIdPatient(null);
            }
        }
        return $this;
    }
}