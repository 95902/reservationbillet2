<?php

namespace App\Repository;

use App\Entity\AgenceLocationVoitures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AgenceLocationVoitures|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgenceLocationVoitures|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgenceLocationVoitures[]    findAll()
 * @method AgenceLocationVoitures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgenceLocationVoituresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgenceLocationVoitures::class);
    }

    // /**
    //  * @return AgenceLocationVoitures[] Returns an array of AgenceLocationVoitures objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AgenceLocationVoitures
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
