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

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_livr = null;

    #[ORM\Column]
    private ?int $com_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getComId(): ?int
    {
        return $this->com_id;
    }

    public function setComId(int $com_id): static
    {
        $this->com_id = $com_id;

        return $this;
    }
}
