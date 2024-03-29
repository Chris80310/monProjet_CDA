<?php

namespace App\Repository;

use App\Entity\Scat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Scat>
 *
 * @method Scat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scat[]    findAll()
 * @method Scat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class ScatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scat::class);
    }

    public function save(Scat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Scat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

     // top 3 sous-catégories :

    public function top3_scat(): array
    {
        $queryBuilder = $this->createQueryBuilder('sc');

        $queryBuilder
            ->select('count(com.id) AS nbr_vente, com.id, com.libelle, com.image')
            ->leftJoin('sc.produit', 'p')
            ->leftJoin('p.scat', 'c')
            ->leftJoin('sc.com', 'cmm')
            ->where('com.active = :active')
            ->setParameter('active', true)
            ->groupBy('com.id')
            ->orderBy('nbr_vente', 'DESC')
            ->setMaxResults(3);

        $result = $queryBuilder->getQuery()->getResult();
        return $result;
    }

    //    /**
    //     * @return Scat[] Returns an array of Scat objects
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

    //    public function findOneBySomeField($value): ?Scat
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
