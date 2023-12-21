<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
class Utilisateurs implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_util = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nom_entr = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cli_nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cli_prenom = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 2, nullable: true)]
    private ?string $coef = null;

    #[ORM\Column(length: 1)]
    private array $roles = [];

    #[ORM\Column(length: 50)]
    private ?string $util_mdp = null;

    #[ORM\Column(nullable: true)]
    private ?bool $com_assignee = null;

    #[ORM\ManyToOne(targetEntity: Utilisateurs::class)]
    #[JoinColumn(name: 'id_util_2', referencedColumName: 'id_util')]
    private ?utilisateurs $id_util_2 = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNomEntr(): ?string
    {
        return $this->nom_entr;
    }

    public function setNomEntr(?string $nom_entr): static
    {
        $this->nom_entr = $nom_entr;

        return $this;
    }

    public function getCliNom(): ?string
    {
        return $this->cli_nom;
    }

    public function setCliNom(?string $cli_nom): static
    {
        $this->cli_nom = $cli_nom;

        return $this;
    }

    public function getCliPrenom(): ?string
    {
        return $this->cli_prenom;
    }

    public function setCliPrenom(?string $cli_prenom): static
    {
        $this->cli_prenom = $cli_prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }


    public function getCoef(): ?string
    {
        return $this->coef;
    }

    public function setCoef(?string $coef): static
    {
        $this->coef = $coef;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guaranti que chaque utilisateurs ont par défaut le ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    ///////// MDP ///////////

    public function getPassword(): ?string
    {
        return $this->util_mdp;
    }

    public function setPassword(string $util_mdp): static
    {
        $this->util_mdp = $util_mdp;

        return $this;
    }

    public function eraseCredentials()
    {
        // Effacer des données temporaires et sensibles sur l'utilisateur :
        // $this->util_mdp = null;
    }

    public function isComAssignee(): ?bool
    {
        return $this->com_assignee;
    }

    public function setComAssignee(?bool $com_assignee): static
    {
        $this->com_assignee = $com_assignee;

        return $this;
    }

    public function getIdUtil2(): ?utilisateurs
    {
        return $this->id_util_2;
    }

    public function setIdUtil2(?utilisateurs $id_util_2): static
    {
        $this->id_util_2 = $id_util_2;

        return $this;
    }
}