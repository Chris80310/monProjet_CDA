<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ScatRepository;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: ScatRepository::class)]
#[ApiResource()]
class Scat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\ManyToOne(targetEntity: Cat::class, inversedBy: 'scat')]

    #[ORM\OneToMany(mappedBy: 'scat', targetEntity: Produit::class, cascade: ['persist', 'remove'])]
    private Collection $produit;

    #[ORM\ManyToOne(inversedBy: 'scat', targetEntity: Cat::class)]
    #[ORM\JoinColumn(name: 'cat_id', referencedColumnName: 'id')]
    private ?Cat $cat = null;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): static
    {
        $this->img = $img;

        return $this;
    }

        public function getCat(): ?Cat
    {
        return $this->cat;
    }

    public function setCat(?Cat $cat): static
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produit->contains($produit)) {
            $this->produit->add($produit);
            $produit->setScat($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produit->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getScat() === $this) {
                $produit->setScat(null);
            }
        }

        return $this;
    }
}
