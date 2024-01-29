<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateursRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;


    // #[ORM\Column(length: 180, unique: true)]
    // private ?string $email = null;

    // #[ORM\Column]
    // private array $roles = [];

    // /**
    //  * @var string The hashed password
    //  */
    // #[ORM\Column]
    // private ?string $password = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    // public function getEmail(): ?string
    // {
    //     return $this->email;
    // }

    // public function setEmail(string $email): static
    // {
    //     $this->email = $email;

    //     return $this;
    // }

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]

#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]

class Utilisateurs implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nom_entr = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $tel = null;

    // #[ORM\Column(length: 180, unique: true)]
    // private ?string $adr = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 2, nullable: true)]
    private ?string $coef = null;

    #[ORM\Column(length: 1)]
    private array $roles = [];

    #[ORM\Column(length: 50)]
    private ?string $mdp = null;

    #[ORM\Column(nullable: true)]
    private ?bool $com_assignee = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'id')]
    private ?self $resp = null;

    #[ORM\OneToMany(mappedBy: 'utilisateurs', targetEntity: Commande::class)]
    private Collection $commande;

    #[ORM\OneToMany(mappedBy: 'utilisateurs', targetEntity: Adresse::class)]
    private Collection $Adresse;

    // #[ORM\Column]
    // private ?string $password = null;

    // #[ORM\Column]
    // private ?int $resp = null;

    public function __construct()
    {
        $this->commande = new ArrayCollection();
        $this->Adresse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function setId(int $id): static
    // {
    //     $this->id = $id;

    //     return $this;
    // }

    public function getNomEntr(): ?string
    {
        return $this->nom_entr;
    }

    public function setNomEntr(?string $nom_entr): static
    {
        $this->nom_entr = $nom_entr;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

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

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

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
        // guaranti que chaque utilisateurs ont par défaut le ROLEs_USER
        $roles[] = 'ROLES_USER';

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
        return $this->mdp;
    }

    public function setPassword(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function eraseCredentials()
    {
        // Effacer des données temporaires et sensibles sur l'utilisateur :
        // $this->mdp = null;
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

    // public function getIdUtil2(): ?utilisateurs
    // {
    //     return $this->id_2;
    // }

    // public function setIdUtil2(?utilisateurs $id_2): static
    // {
    //     $this->id_2 = $id_2;

    //     return $this;
    // }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commande->contains($commande)) {
            $this->commande->add($commande);
            $commande->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commande->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUtilisateurs() === $this) {
                $commande->setUtilisateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Adresse>
     */
    public function getAdresse(): Collection
    {
        return $this->Adresse;
    }

    public function addAdress(Adresse $adress): static
    {
        if (!$this->Adresse->contains($adress)) {
            $this->Adresse->add($adress);
            $adress->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeAdress(Adresse $adress): static
    {
        if ($this->Adresse->removeElement($adress)) {
            // set the owning side to null (unless already changed)
            if ($adress->getUtilisateurs() === $this) {
                $adress->setUtilisateurs(null);
            }
        }

        return $this;
    }

    public function getResp(): ?self
    {
        return $this->resp;
    }

    public function setResp(?self $resp): static
    {
        $this->resp = $resp;

        return $this;
    }

     /**
     * @see PasswordAuthenticatedUserInterface
     */
    // public function getPassword(): string
    // {
    //     return $this->password;
    // }

    // public function setPassword(string $password): static
    // {
    //     $this->password = $password;

    //     return $this;
    // }

}