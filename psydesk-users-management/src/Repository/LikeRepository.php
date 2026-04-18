<?php

namespace App\Repository;

use App\Entity\Like;
use App\Entity\Article;
use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Like::class);
    }

    /**
     * Vérifie si un user a déjà liké un article
     */
    public function findOneByUserAndArticle(Users $user, Article $article): ?Like
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.user = :user')
            ->andWhere('l.article = :article')
            ->setParameter('user', $user)
            ->setParameter('article', $article)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Compter les likes d’un article
     */
    public function countLikes(Article $article): int
    {
        return $this->createQueryBuilder('l')
            ->select('COUNT(l.id)')
            ->andWhere('l.article = :article')
            ->setParameter('article', $article)
            ->getQuery()
            ->getSingleScalarResult();
    }
}