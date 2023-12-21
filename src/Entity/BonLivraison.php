<?php

namespace App\Entity;

use App\Repository\BonLivraisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonLivraisonRepository::class)]
class BonLivraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_bl = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_livr = null;

    #[ORM\Column]
    private ?int $id_com = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBl(): ?int
    {
        return $this->id_bl;
    }

    public function setIdBl(int $id_bl): static
    {
        $this->id_bl = $id_bl;

        return $this;
    }

    public function getDateLivr(): ?\DateTimeInterface
    {
        return $this->date_livr;
    }

    public function setDateLivr(\DateTimeInterface $date_livr): static
    {
        $this->date_livr = $date_livr;

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
}
