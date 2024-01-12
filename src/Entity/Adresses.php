<?php

namespace App\Entity;

use App\Repository\AdressesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdressesRepository::class)]
class Adresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]

    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_livr = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_fact = null;

    #[ORM\Column(length: 255)]
    private ?string $util_adr = null;

    #[ORM\ManyToOne(inversedBy: 'Adresses')]
    private ?Utilisateurs $utilisateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAdr(): ?int
    {
        return $this->id;
    }

    public function setIdAdr(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdUtil(): ?int
    {
        return $this->id;
    }

    public function setIdUtil(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCliAdrLivr(): ?string
    {
        return $this->adr_livr;
    }

    public function setCliAdrLivr(string $adr_livr): static
    {
        $this->adr_livr = $adr_livr;

        return $this;
    }

    public function getCliAdrFact(): ?string
    {
        return $this->adr_fact;
    }

    public function setCliAdrFact(string $adr_fact): static
    {
        $this->adr_fact = $adr_fact;

        return $this;
    }

    public function getUtilAdr(): ?string
    {
        return $this->util_adr;
    }

    public function setUtilAdr(string $util_adr): static
    {
        $this->util_adr = $util_adr;

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
