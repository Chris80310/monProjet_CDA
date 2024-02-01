<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cat;
use App\Entity\Produit;
use App\Entity\Scat;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

    $c1 = new Cat();
    $c1->setLibelleCat("logiciels");
    $c1->setImgCat("/img/cat/MicrosoftWindows11Pro64-bitLicense-InternationalEnglish_DVD-ROM_02.webp");
    $manager->persist($c1);

    $sc1 = new Scat();
    $sc1->setLibelle("/img/cat/logiciel d'exploitation");
    $sc1->setImg("MicrosoftWindows11Pro64-bitLicense-InternationalEnglish_DVD-ROM_02.webp");
    $c1->addScat($sc1);
    $manager->persist($sc1);

    $p1 = new Produit();
        $p1->setLibelle("Windows 11");
        $p1->setDescription("windows 11 pro");
        $p1->setImgProd("/img/cat/windows-11-pro.png");
        $p1->setPrixAchatFourn(75.00);
        $p1->setPrixVenteHt(99.99);
        $p1->setScat($sc1);
        $manager->persist($p1);

        $manager->flush();
    }
}
