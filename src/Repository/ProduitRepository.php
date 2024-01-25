<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 *
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    // public function save(Detail $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->persist($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

    // public function remove(Detail $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->remove($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

//    /**
//     * @return Produit[] Returns an array of Produit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Produit
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function save(Produit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Produit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // Produits par catégories :

    public function prodParCat($id): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.cat = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    // sous-catégories par catégories :

    public function scatParCat($id): array
    {
        return $this->createQueryBuilder('c')
            ->where('cat.scat = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    // Produits par sous-catégories :

    public function prodParScat($id): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.scat = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    // Produits par fabricant :

    public function prodParFab($id): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.fabricant = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    // top 3 ventes :

    // public function top3ventes(): array
    // {
    //     $queryBuilder = $this->createQueryBuilder('t');

    //     $queryBuilder
    //         ->select('count(p.id) AS nbr_vente, p.id, p.libelle, p.image')
    //         ->leftJoin('t.produit', 'p')
    //         ->leftJoin('t.commande', 'c')
    //         ->where('c.etat = :etat')
    //         ->setParameter('etat', 3)
    //         ->groupBy('p.id')
    //         ->orderBy('nbr_vente', 'DESC')
    //         ->setMaxResults(3);

    //     $result = $queryBuilder->getQuery()->getResult();
    //     return $result;
    // }

    // Barre de recherche :

    public function findSearch($search): array
    {
        $libelle = '%' . $search . '%';
        $description = '%' . $search . '%';

        return $this->createQueryBuilder('p')

            ->andwhere('p.libelle like :libelle')
            ->orWhere('p.description like :description')
            ->setParameters([':description' => $description, ':libelle' => $libelle])
            ->getQuery()
            ->getResult();
    }
}
