<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $total = null;

    #[ORM\ManyToOne(inversedBy: 'Commande')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $utilisateurs = null;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: Facture::class)]
    private Collection $facture;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: BonLivraison::class)]
    private Collection $bonLivraison;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: DetailsCom::class)]
    private Collection $detailsCom;

    public function __construct()
    {
        $this->facture = new ArrayCollection();
        $this->bonLivraison = new ArrayCollection();
        $this->detailsCom = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): static
    {
        $this->total = $total;

        return $this;
    }

     // public function getAdrLivr(): ?string
    // {
    //     return $this->adr_livr;
    // }

    // public function setAdrLivr(string $adr_livr): static
    // {
    //     $this->adr_livr = $adr_livr;

    //     return $this;
    // }

    // public function getAdrFact(): ?string
    // {
    //     return $this->adr_fact;
    // }

    // public function setAdrFact(string $adr_fact): static
    // {
    //     $this->adr_fact = $adr_fact;

    //     return $this;
    // }

    public function getUtilisateurs(): ?Utilisateurs
    {
        return $this->utilisateurs;
    }

    public function setUtilisateurs(?Utilisateurs $utilisateurs): static
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * @return Collection<int, Facture>
     */
    public function getFacture(): Collection
    {
        return $this->facture;
    }

    public function addFacture(Facture $facture): static
    {
        if (!$this->facture->contains($facture)) {
            $this->facture->add($facture);
            $facture->setCommande($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): static
    {
        if ($this->facture->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getCommande() === $this) {
                $facture->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BonLivraison>
     */
    public function getBonLivraison(): Collection
    {
        return $this->bonLivraison;
    }

    public function addBonLivraison(BonLivraison $bonLivraison): static
    {
        if (!$this->bonLivraison->contains($bonLivraison)) {
            $this->bonLivraison->add($bonLivraison);
            $bonLivraison->setCommande($this);
        }

        return $this;
    }

    public function removeBonLivraison(BonLivraison $bonLivraison): static
    {
        if ($this->bonLivraison->removeElement($bonLivraison)) {
            // set the owning side to null (unless already changed)
            if ($bonLivraison->getCommande() === $this) {
                $bonLivraison->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DetailsCom>
     */
    public function getDetailsCom(): Collection
    {
        return $this->detailsCom;
    }

    public function addDetailsCom(DetailsCom $detailsCom): static
    {
        if (!$this->detailsCom->contains($detailsCom)) {
            $this->detailsCom->add($detailsCom);
            $detailsCom->setCommande($this);
        }

        return $this;
    }

    public function removeDetailsCom(DetailsCom $detailsCom): static
    {
        if ($this->detailsCom->removeElement($detailsCom)) {
            // set the owning side to null (unless already changed)
            if ($detailsCom->getCommande() === $this) {
                $detailsCom->setCommande(null);
            }
        }

        return $this;
    }
}
