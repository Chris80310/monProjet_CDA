<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]

    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column]
    // private ?int $libelle = null;

    #[ORM\Column]
    private ?int $util_id = null;

    #[ORM\Column(length: 255)]
    private ?string $adr = null;

    #[ORM\Column(length: 255)]
    private ?string $livraison = null;

    #[ORM\Column(length: 255)]
    private ?string $facturation = null;

    #[ORM\ManyToOne(inversedBy: 'Adresse')]
    private ?Utilisateurs $utilisateurs = null;

    // #[ORM\ManyToMany(inversedBy: 'Adresse')]
    // private ?Utilisateurs $utilisateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function setId(int $id): static
    // {
    //     $this->id = $id;

    //     return $this;
    // }


    public function getUtilId(): ?int
    {
        return $this->util_id;
    }

    // public function setUtilId(int $util_id): ?int
    // {
    //     $this->util_id = $util_id;

    //     return $this;
    // }


    public function getAdr(): ?string
    {
        return $this->adr;
    }

    public function setAdr(string $adr): static
    {
        $this->adr = $adr;

        return $this;
    }


    // public function getAdrLibelle(): ?string
    // {
    //     return $this->libelle;
    // }

    // public function setAdrLibelle(string $libelle): static
    // {
    //     $this->libelle = $libelle;

    //     return $this;
    // }

    public function getAdrLivr(): ?string
    {
        return $this->livraison;
    }

    public function setAdrLivr(string $livraison): static
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getAdrFacturation(): ?string
    {
        return $this->facturation;
    }

    public function setAdrFacturation(string $facturation): static
    {
        $this->facturation = $facturation;

        return $this;
    }

    public function getUtilisateurs(): ?Utilisateurs
    {
        return $this->utilisateurs;
    }

    public function setUtilisateurs(?Utilisateurs $utilisateurs): static
    {
        $this->utilisateurs = $utilisateurs;
        return $this;
    }

    public function __toString()
    {
        return $this->adr;
    }
}
