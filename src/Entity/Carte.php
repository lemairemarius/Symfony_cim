<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=CarteRepository::class)
 */
class Carte
{

    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

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
     * @ORM\ManyToMany(targetEntity=Cimetiere::class, inversedBy="cartes")
     */
    private $acces;

    public function __construct()
    {
        $this->acces = new ArrayCollection();
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

    /**
     * @return Collection|Cimetiere[]
     */
    public function getAcces(): Collection
    {
        return $this->acces;
    }

    public function addAcce(Cimetiere $acce): self
    {
        if (!$this->acces->contains($acce)) {
            $this->acces[] = $acce;
        }

        return $this;
    }

    public function removeAcce(Cimetiere $acce): self
    {
        $this->acces->removeElement($acce);

        return $this;
    }
}
