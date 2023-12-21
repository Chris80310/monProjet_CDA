<?php

namespace App\Entity;

use App\Repository\SsCatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SsCatRepository::class)]
class SsCat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_ss_cat = null;

    #[ORM\Column(length: 255)]
    private ?string $libel_ss_cat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_ss_cat = null;

    #[ORM\Column]
    private ?int $id_cat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSsCat(): ?int
    {
        return $this->id_ss_cat;
    }

    public function setIdSsCat(int $id_ss_cat): static
    {
        $this->id_ss_cat = $id_ss_cat;

        return $this;
    }

    public function getLibelSsCat(): ?string
    {
        return $this->libel_ss_cat;
    }

    public function setLibelSsCat(string $libel_ss_cat): static
    {
        $this->libel_ss_cat = $libel_ss_cat;

        return $this;
    }

    public function getImgSsCat(): ?string
    {
        return $this->img_ss_cat;
    }

    public function setImgSsCat(?string $img_ss_cat): static
    {
        $this->img_ss_cat = $img_ss_cat;

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
