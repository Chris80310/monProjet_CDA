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

    #[ORM\Column]
    private ?int $id_adr = null;

    #[ORM\Column]
    private ?int $id_util = null;

    #[ORM\Column(length: 255)]
    private ?string $cli_adr_livr = null;

    #[ORM\Column(length: 255)]
    private ?string $cli_adr_fact = null;

    #[ORM\Column(length: 255)]
    private ?string $util_adr = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAdr(): ?int
    {
        return $this->id_adr;
    }

    public function setIdAdr(int $id_adr): static
    {
        $this->id_adr = $id_adr;

        return $this;
    }

    public function getIdUtil(): ?int
    {
        return $this->id_util;
    }

    public function setIdUtil(int $id_util): static
    {
        $this->id_util = $id_util;

        return $this;
    }

    public function getCliAdrLivr(): ?string
    {
        return $this->cli_adr_livr;
    }

    public function setCliAdrLivr(string $cli_adr_livr): static
    {
        $this->cli_adr_livr = $cli_adr_livr;

        return $this;
    }

    public function getCliAdrFact(): ?string
    {
        return $this->cli_adr_fact;
    }

    public function setCliAdrFact(string $cli_adr_fact): static
    {
        $this->cli_adr_fact = $cli_adr_fact;

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
}
