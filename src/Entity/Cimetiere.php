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
     * @ORM\ManyToMany(targetEntity=Carte::class, mappedBy="acces")
     */
    private $cartes;

    public function __construct()
    {
        $this->cartes = new ArrayCollection();
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

    /**
     * @return Collection|Carte[]
     */
    public function getCartes(): Collection
    {
        return $this->cartes;
    }

    public function addCarte(Carte $carte): self
    {
        if (!$this->cartes->contains($carte)) {
            $this->cartes[] = $carte;
            $carte->addAcce($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->cartes->removeElement($carte)) {
            $carte->removeAcce($this);
        }

        return $this;
    }
}
