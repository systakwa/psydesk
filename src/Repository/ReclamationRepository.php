<?php

namespace App\Repository;

use App\Entity\Reclamation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Reclamation>
 */
class ReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclamation::class);
    }

    /**
     * Recherche avancée (description, nom patient, prénom, email)
     */
    public function searchByTerm(string $term): array
    {
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.idPatient', 'p')
            ->where('r.description LIKE :term')
            ->orWhere('p.nom LIKE :term')
            ->orWhere('p.prenom LIKE :term')
            ->orWhere('p.email LIKE :term')
            ->setParameter('term', '%' . $term . '%')
            ->orderBy('r.date', 'DESC');

        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Reclamation[] Returns an array of Reclamation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reclamation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
