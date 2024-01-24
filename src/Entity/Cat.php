<?php

namespace App\Entity;

use App\Repository\CatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatRepository::class)]
class Cat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'cat', targetEntity: Scat::class)]
    private Collection $scat;



        public function __construct()
    {
        $this->scat = new ArrayCollection();
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

    public function getImgCat(): ?string
    {
        return $this->img;
    }

    public function setImgCat(?string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getLibelleCat(): ?string
    {
        return $this->libelle;
    }

    public function setLibelleCat(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

        public function getScat(): Collection
    {
        return $this->scat;
    }

    public function setScat(Collection $scat): static
    {
        $this->scat = $scat;

        return $this;
    }

        public function addScat(Scat $scat): static
    {
        if (!$this->scat->contains($scat)) {
            $this->scat->add($scat);
            $scat->setCat($this);
        }

        return $this;
    }

    public function removeScat(Scat $scat): static
    {
        if ($this->scat->removeElement($scat)) {
            // set the owning side to null (unless already changed)
            if ($scat->getCat() === $this) {
                $scat->setCat(null);
            }
        }

    return $this;
}

}
