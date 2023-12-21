<?php

namespace App\Entity;

use App\Repository\DetailsCommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailsCommandeRepository::class)]
class DetailsCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_prod = null;

    #[ORM\Column]
    private ?int $id_com = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: '0')]
    private ?string $qte = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProd(): ?int
    {
        return $this->id_prod;
    }

    public function setIdProd(int $id_prod): static
    {
        $this->id_prod = $id_prod;

        return $this;
    }

    public function getIdCom(): ?int
    {
        return $this->id_com;
    }

    public function setIdCom(int $id_com): static
    {
        $this->id_com = $id_com;

        return $this;
    }

    public function getQte(): ?string
    {
        return $this->qte;
    }

    public function setQte(string $qte): static
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
