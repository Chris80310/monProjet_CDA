<?php

namespace App\Repository;

use App\Entity\SCat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SCat>
 *
 * @method SCat|null find($id, $lockMode = null, $lockVersion = null)
 * @method SCat|null findOneBy(array $criteria, array $orderBy = null)
 * @method SCat[]    findAll()
 * @method SCat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SCatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SCat::class);
    }

    //    /**
    //     * @return SCat[] Returns an array of SCat objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SCat
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
