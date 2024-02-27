<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[ApiResource()]
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
    private ?string $prix_ach_fourn = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix_vente_ht = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    // #[ORM\Column]
    // private ?int $fab_id = null;

    #[ORM\Column]
    private ?int $scat_id = null;

    #[ORM\ManyToOne(targetEntity: Scat::class, inversedBy: 'produit')]
    #[ORM\JoinColumn(name: 'scat_id', referencedColumnName: 'id')]
    private ?Scat $scat = null;

    #[ORM\ManyToOne(inversedBy: 'produit')]
    private ?Fabricant $fabricant = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    // public function setId(int $id): static
    // {
    //     $this->id = $id;

    //     return $this;
    // }

    public function getImgProd(): ?string
    {
        return $this->img;
    }

    public function setImgProd(?string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrixAchatFourn(): ?string
    {
        return $this->prix_ach_fourn;
    }

    public function setPrixAchatFourn(string $prix_ach_fourn): static
    {
        $this->prix_ach_fourn = $prix_ach_fourn;

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

    // public function getFabId(): ?int
    // {
    //     return $this->fab_id;
    // }

    // public function setFabId(int $fab_id): static
    // {
    //     $this->fab_id = $fab_id;

    //     return $this;
    // }

    public function getScatId(): ?int
    {
        return $this->scat_id;
    }

    public function setScatId(int $scat_id): static
    {
        $this->scat_id = $scat_id;

        return $this;
    }


    public function getScat(): ?Scat
    {
        return $this->scat;
    }

    public function setScat(?Scat $scat): self
    {
        $this->scat = $scat;

        return $this;
    }

    public function getFabricant(): ?Fabricant
    {
        return $this->fabricant;
    }

    public function setFabricant(?Fabricant $fabricant): static
    {
        $this->fabricant = $fabricant;

        return $this;
    }

}
