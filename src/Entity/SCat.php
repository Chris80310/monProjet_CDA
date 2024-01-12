<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SCatRepository::class)]
class SsCat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column]
    private ?int $id_cat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSsCat(): ?int
    {
        return $this->id;
    }

    public function setIdSsCat(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getLibelleSsCat(): ?string
    {
        return $this->libelle;
    }

    public function setLibelleSsCat(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getImgSsCat(): ?string
    {
        return $this->img;
    }

    public function setImgSsCat(?string $img): static
    {
        $this->img = $img;

        return $this;
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
}
