<?php

namespace App\Repository;

use App\Entity\RelatedVoyage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RelatedVoyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method RelatedVoyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method RelatedVoyage[]    findAll()
 * @method RelatedVoyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RelatedVoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RelatedVoyage::class);
    }

    // /**
    //  * @return RelatedVoyage[] Returns an array of RelatedVoyage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RelatedVoyage
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
