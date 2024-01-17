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

    // Produits par sous-catégories :

    public function prodParSCat($id): array
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
            ->where('p.fab = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

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
