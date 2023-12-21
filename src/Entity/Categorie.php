<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_cat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_cat = null;

    #[ORM\Column(length: 255)]
    private ?string $libel_cat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCat(): ?int
    {
        return $this->id_cat;
    }

    public function setIdCat(int $id_cat): static
    {
        $this->id_cat = $id_cat;

        return $this;
    }

    public function getImgCat(): ?string
    {
        return $this->img_cat;
    }

    public function setImgCat(?string $img_cat): static
    {
        $this->img_cat = $img_cat;

        return $this;
    }

    public function getLibelCat(): ?string
    {
        return $this->libel_cat;
    }

    public function setLibelCat(string $libel_cat): static
    {
        $this->libel_cat = $libel_cat;

        return $this;
    }
}
