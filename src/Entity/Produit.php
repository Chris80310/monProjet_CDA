<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prxAchFourn = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix_vente_ht = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $id_fab = null;

    #[ORM\Column]
    private ?int $id_ss_cat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProd(): ?int
    {
        return $this->id;
    }

    public function setIdProd(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getImgProd(): ?string
    {
        return $this->img;
    }

    public function setImgProd(?string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getLibelleProd(): ?string
    {
        return $this->libelle;
    }

    public function setLibelleProd(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrixAchatFourn(): ?string
    {
        return $this->prxAchFourn;
    }

    public function setPrixAchatFourn(string $prxAchFourn): static
    {
        $this->prxAchFourn = $prxAchFourn;

        return $this;
    }

    public function getPrixVenteHt(): ?string
    {
        return $this->prix_vente_ht;
    }

    public function setPrixVenteHt(string $prix_vente_ht): static
    {
        $this->prix_vente_ht = $prix_vente_ht;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIdFab(): ?int
    {
        return $this->id_fab;
    }

    public function setIdFab(int $id_fab): static
    {
        $this->id_fab = $id_fab;

        return $this;
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
}
