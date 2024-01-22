<?php

namespace App\Entity;

use App\Repository\CatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatRepository::class)]
class Cat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getImgCat(): ?string
    {
        return $this->img;
    }

    public function setImgCat(?string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getLibelleCat(): ?string
    {
        return $this->libelle;
    }

    public function setLibelleCat(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }
}
