<?php

namespace App\Entity;

use App\Repository\DetailsComRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailsComRepository::class)]
class DetailsCom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $prod_id = null;

    #[ORM\Column]
    private ?int $com_id = null;

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
        return $this->prod_id;
    }

    public function setIdProd(int $prod_id): static
    {
        $this->prod_id = $prod_id;

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
