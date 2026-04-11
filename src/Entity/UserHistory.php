<?php
// src/Entity/UserHistory.php

namespace App\Entity;

use App\Repository\UserHistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserHistoryRepository::class)]
#[ORM\Table(name: 'user_history')]
class UserHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $userId = null;

    #[ORM\Column(length: 50)]
    private ?string $actionType = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $fieldName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $oldValue = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $newValue = null;

    #[ORM\Column(nullable: true)]
    private ?int $modifiedBy = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $ipAddress = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $userAgent = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // Getters et Setters
    public function getId(): ?int { return $this->id; }
    
    public function getUserId(): ?int { return $this->userId; }
    public function setUserId(int $userId): static { $this->userId = $userId; return $this; }
    
    public function getActionType(): ?string { return $this->actionType; }
    public function setActionType(string $actionType): static { $this->actionType = $actionType; return $this; }
    
    public function getFieldName(): ?string { return $this->fieldName; }
    public function setFieldName(?string $fieldName): static { $this->fieldName = $fieldName; return $this; }
    
    public function getOldValue(): ?string { return $this->oldValue; }
    public function setOldValue(?string $oldValue): static { $this->oldValue = $oldValue; return $this; }
    
    public function getNewValue(): ?string { return $this->newValue; }
    public function setNewValue(?string $newValue): static { $this->newValue = $newValue; return $this; }
    
    public function getModifiedBy(): ?int { return $this->modifiedBy; }
    public function setModifiedBy(?int $modifiedBy): static { $this->modifiedBy = $modifiedBy; return $this; }
    
    public function getIpAddress(): ?string { return $this->ipAddress; }
    public function setIpAddress(?string $ipAddress): static { $this->ipAddress = $ipAddress; return $this; }
    
    public function getUserAgent(): ?string { return $this->userAgent; }
    public function setUserAgent(?string $userAgent): static { $this->userAgent = $userAgent; return $this; }
    
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): static { $this->createdAt = $createdAt; return $this; }
}