<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\entity\Produit;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        
    // {
    //     for ($i = 0; $i < 20; $i++) {
    //        $city = new Villes();
    //        $city->setName('ville-'. $i);
    //        $manager->persist($city);
    //     }

    //     $manager->flush();
    // }

    //     $produit1 = new Produit();

    //        $produit1->setNomProd("Equipement machine et stand");
    //        $produit1->setImg("Daytona67R.jpg");

    //        $manager->persist($produit1);

    //     $manager->flush();
    }
}
