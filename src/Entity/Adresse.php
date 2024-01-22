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

    #[ORM\Column]
    private ?int $util_id = null;

    #[ORM\Column(length: 255)]
    private ?string $adr = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_livr = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_fact = null;

    #[ORM\ManyToOne(inversedBy: 'Adresse')]
    private ?Utilisateurs $utilisateurs = null;

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

    public function getAdrLivr(): ?string
    {
        return $this->adr_livr;
    }

    public function setAdrLivr(string $adr_livr): static
    {
        $this->adr_livr = $adr_livr;

        return $this;
    }

    public function getAdrFact(): ?string
    {
        return $this->adr_fact;
    }

    public function setAdrFact(string $adr_fact): static
    {
        $this->adr_fact = $adr_fact;

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
}
