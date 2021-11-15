<?php

namespace App\Entity;

use App\Repository\CimetiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CimetiereRepository::class)
 */
class Cimetiere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_cim;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress_cim;

    /**
     * @ORM\OneToMany(targetEntity=Carte::class, mappedBy="acces_c")
     */
    private $acces;

    /**
     * @ORM\ManyToOne(targetEntity=Carte::class, inversedBy="accesCim")
     */
    private $carte;

    /**
     * @ORM\ManyToMany(targetEntity=Carte::class, mappedBy="acces")
     */
    private $cartes;

    /**
     * @ORM\ManyToMany(targetEntity=Carte::class, inversedBy="cimetieres")
     */
    private $carteAcces;

    public function __construct()
    {
        $this->cartes = new ArrayCollection();
        $this->acces = new ArrayCollection();
        $this->carteAcces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCim(): ?string
    {
        return $this->nom_cim;
    }

    public function setNomCim(string $nom_cim): self
    {
        $this->nom_cim = $nom_cim;

        return $this;
    }

    public function getAdressCim(): ?string
    {
        return $this->adress_cim;
    }

    public function setAdressCim(string $adress_cim): self
    {
        $this->adress_cim = $adress_cim;

        return $this;
    }


    public function __toString(){
        return $this->nom_cim;
    }

    /**
     * @return Collection|Carte[]
     */
    public function getCarteAcces(): Collection
    {
        return $this->carteAcces;
    }

    public function addCarteAcce(Carte $carteAcce): self
    {
        if (!$this->carteAcces->contains($carteAcce)) {
            $this->carteAcces[] = $carteAcce;
        }

        return $this;
    }

    public function removeCarteAcce(Carte $carteAcce): self
    {
        $this->carteAcces->removeElement($carteAcce);

        return $this;
    }
}
