<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1)]
    private ?string $mode_paie = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prix_ht = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_emi = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 2)]
    private ?string $taux_tva = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prix_tot = null;

    #[ORM\Column]
    private ?int $com_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function setId(int $id): static
    // {
    //     $this->id = $id;

    //     return $this;
    // }

    public function getModePaie(): ?string
    {
        return $this->mode_paie;
    }

    public function setModePaie(string $mode_paie): static
    {
        $this->mode_paie = $mode_paie;

        return $this;
    }

    public function getPrixHt(): ?string
    {
        return $this->prix_ht;
    }

    public function setPrixHt(string $prix_ht): static
    {
        $this->prix_ht = $prix_ht;

        return $this;
    }

    public function getDateEmi(): ?\DateTimeInterface
    {
        return $this->date_emi;
    }

    public function setDateEmi(\DateTimeInterface $date_emi): static
    {
        $this->date_emi = $date_emi;

        return $this;
    }

    public function getTauxTva(): ?string
    {
        return $this->taux_tva;
    }

    public function setTauxTva(string $taux_tva): static
    {
        $this->taux_tva = $taux_tva;

        return $this;
    }

    public function getPrixTot(): ?string
    {
        return $this->prix_tot;
    }

    public function setPrixTot(string $prix_tot): static
    {
        $this->prix_tot = $prix_tot;

        return $this;
    }

    public function getIdCom(): ?int
    {
        return $this->com_id;
    }

    public function setIdCom(int $com_id): static
    {
        $this->com_id = $com_id;

        return $this;
    }
}
