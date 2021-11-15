<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=CarteRepository::class)
 */
class Carte
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
    private $num_card;

    /**
     * @ORM\Column(type="date")
     */
    private $dCard_endVal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $card_val;

    /**
     * @ORM\ManyToMany(targetEntity=Cimetiere::class, mappedBy="carteAcces")
     */
    private $cimetieres;

    public function __construct()
    {
        $this->cimetieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCard(): ?string
    {
        return $this->num_card;
    }

    public function setNumCard(string $num_card): self
    {
        $this->num_card = $num_card;

        return $this;
    }

    public function getDCardEndVal(): ?\DateTimeInterface
    {
        return $this->dCard_endVal;
    }

    public function setDCardEndVal(\DateTimeInterface $dCard_endVal): self
    {
        $this->dCard_endVal = $dCard_endVal;

        return $this;
    }

    public function getCardVal(): ?bool
    {
        return $this->card_val;
    }

    public function setCardVal(bool $card_val): self
    {
        $this->card_val = $card_val;

        return $this;
    }


    public function getAccesC(): ?Cimetiere
    {
        return $this->acces_c;
    }

    public function setAccesC(?Cimetiere $acces_c): self
    {
        $this->acces_c = $acces_c;

        return $this;
    }





    public function removeAcce(Cimetiere $acce): self
    {
        $this->acces->removeElement($acce);

        return $this;
    }

    /**
     * @return Collection|CimAm[]
     */
    public function getAccess(): Collection
    {
        return $this->access;
    }

    public function addAccess(CimAm $access): self
    {
        if (!$this->access->contains($access)) {
            $this->access[] = $access;
            $access->setCarte($this);
        }

        return $this;
    }

    public function removeAccess(CimAm $access): self
    {
        if ($this->access->removeElement($access)) {
            // set the owning side to null (unless already changed)
            if ($access->getCarte() === $this) {
                $access->setCarte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cimetiere[]
     */
    public function getCimetieres(): Collection
    {
        return $this->cimetieres;
    }

    public function addCimetiere(Cimetiere $cimetiere): self
    {
        if (!$this->cimetieres->contains($cimetiere)) {
            $this->cimetieres[] = $cimetiere;
            $cimetiere->addCarteAcce($this);
        }

        return $this;
    }

    public function removeCimetiere(Cimetiere $cimetiere): self
    {
        if ($this->cimetieres->removeElement($cimetiere)) {
            $cimetiere->removeCarteAcce($this);
        }

        return $this;
    }
}
