<?php

namespace App\Repository;

use App\Entity\Objectif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Objectif>
 */
class ObjectifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Objectif::class);
    }

    /**
     * Retourne la moyenne de satisfaction et le nombre de notes pour un objectif.
     * @return array{average:?float, count:int}
     */
    public function getAverageSatisfaction(int $objectifId): array
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('AVG(n.satisfer) as avg', 'COUNT(n.id) as cnt')
            ->from('App\\Entity\\Notejour', 'n')
            ->andWhere('n.idObjectif = :id')
            ->andWhere('n.satisfer IS NOT NULL')
            ->setParameter('id', $objectifId);

        $result = $qb->getQuery()->getSingleResult();

        $avg = $result['avg'] !== null ? (float) $result['avg'] : null;
        $count = isset($result['cnt']) ? (int) $result['cnt'] : 0;

        return ['average' => $avg, 'count' => $count];
    }

//    /**
//     * @return Objectif[] Returns an array of Objectif objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Objectif
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
