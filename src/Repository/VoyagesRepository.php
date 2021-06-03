<?php

namespace App\Repository;

use App\Entity\Voyages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Voyages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voyages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voyages[]    findAll()
 * @method Voyages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoyagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voyages::class);
    }


    /**
    * @return Voyages[] Returns an array of Voyages objects
    */
 
    public function findWithSearch($search)
    {

        $query =  $this->createQueryBuilder('v');
            // min max 
        if ($search->getminprix() ) {
            $query = $query->andWhere('v.prix > '.$search->getminprix()*100);
        }
        if ($search->getmaxprix() ) {
            $query = $query->andWhere('v.prix < '.$search->getmaxprix()*100);
        }
       //tag 

        if ($search->getTag() ) {
        $query = $query->andWhere('v.tags like :val')
                        ->setParameter('val', "%{$search->getTag()}%");
        }

        if ($search->getDestination() ) {
            $query = $query->join('v.destnation', 'd')
                            ->andWhere('d.id IN (:destinations)')
                            ->setParameter('destinations', $search->getDestination());
            }
       


        $query->getQuery()->getResult();




    }


      
        
    





    // /**
    //  * @return Voyages[] Returns an array of Voyages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Voyages
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
