<?php

namespace App\Repository;

use App\Entity\MbEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MbEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method MbEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method MbEntity[]    findAll()
 * @method MbEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MbEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MbEntity::class);
    }

    // /**
    //  * @return MbEntity[] Returns an array of MbEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MbEntity
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
