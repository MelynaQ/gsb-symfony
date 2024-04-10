<?php

namespace App\Repository;

use App\Entity\Ficherais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ficherais>
 *
 * @method Ficherais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ficherais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ficherais[]    findAll()
 * @method Ficherais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheraisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ficherais::class);
    }

//    /**
//     * @return Ficherais[] Returns an array of Ficherais objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ficherais
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
