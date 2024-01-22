<?php

namespace App\Repository;

use App\Entity\DetailsCom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DetailsCom>
 *
 * @method DetailsCom|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailsCom|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailsCom[]    findAll()
 * @method DetailsCom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailsComRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailsCom::class);
    }

//    /**
//     * @return DetailsCom[] Returns an array of DetailsCom objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DetailsCom
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
