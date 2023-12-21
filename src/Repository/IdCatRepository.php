<?php

namespace App\Repository;

use App\Entity\IdCat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IdCat>
 *
 * @method IdCat|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdCat|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdCat[]    findAll()
 * @method IdCat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdCatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdCat::class);
    }

//    /**
//     * @return IdCat[] Returns an array of IdCat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IdCat
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
