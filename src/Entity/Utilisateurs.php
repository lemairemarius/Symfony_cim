<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=UtilisateursRepository::class)
 */
class Utilisateurs
{
    /**
     * Hook blameable behavior
     * updates createdBy, updatedBy fields
     */
    use BlameableEntity;

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
    private $nomFam_ut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomUs_ut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pre_ut;

    /**
     * @ORM\Column(type="date")
     */
    private $dayBirth_ut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstAdress_ut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $compAdress_ut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city_ut;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp_ut;

    /**
     * @ORM\ManyToMany(targetEntity=Gestionnaire::class, mappedBy="gere")
     */
    private $gestionnaires;

    /**
     * @ORM\OneToOne(targetEntity=Carte::class, cascade={"persist", "remove"})
     */
    private $possede;

    public function __construct()
    {
        $this->gestionnaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFamUt(): ?string
    {
        return $this->nomFam_ut;
    }

    public function setNomFamUt(string $nomFam_ut): self
    {
        $this->nomFam_ut = $nomFam_ut;

        return $this;
    }

    public function getNomUsUt(): ?string
    {
        return $this->nomUs_ut;
    }

    public function setNomUsUt(?string $nomUs_ut): self
    {
        $this->nomUs_ut = $nomUs_ut;

        return $this;
    }

    public function getPreUt(): ?string
    {
        return $this->pre_ut;
    }

    public function setPreUt(string $pre_ut): self
    {
        $this->pre_ut = $pre_ut;

        return $this;
    }

    public function getDayBirthUt(): ?\DateTimeInterface
    {
        return $this->dayBirth_ut;
    }

    public function setDayBirthUt(\DateTimeInterface $dayBirth_ut): self
    {
        $this->dayBirth_ut = $dayBirth_ut;

        return $this;
    }

    public function getFirstAdressUt(): ?string
    {
        return $this->firstAdress_ut;
    }

    public function setFirstAdressUt(string $firstAdress_ut): self
    {
        $this->firstAdress_ut = $firstAdress_ut;

        return $this;
    }

    public function getCompAdressUt(): ?string
    {
        return $this->compAdress_ut;
    }

    public function setCompAdressUt(?string $compAdress_ut): self
    {
        $this->compAdress_ut = $compAdress_ut;

        return $this;
    }

    public function getCityUt(): ?string
    {
        return $this->city_ut;
    }

    public function setCityUt(string $city_ut): self
    {
        $this->city_ut = $city_ut;

        return $this;
    }

    public function getCpUt(): ?int
    {
        return $this->cp_ut;
    }

    public function setCpUt(int $cp_ut): self
    {
        $this->cp_ut = $cp_ut;

        return $this;
    }

    /**
     * @return Collection|Gestionnaire[]
     */
    public function getGestionnaires(): Collection
    {
        return $this->gestionnaires;
    }

    public function addGestionnaire(Gestionnaire $gestionnaire): self
    {
        if (!$this->gestionnaires->contains($gestionnaire)) {
            $this->gestionnaires[] = $gestionnaire;
            $gestionnaire->addGere($this);
        }

        return $this;
    }

    public function removeGestionnaire(Gestionnaire $gestionnaire): self
    {
        if ($this->gestionnaires->removeElement($gestionnaire)) {
            $gestionnaire->removeGere($this);
        }

        return $this;
    }

    public function getPossede(): ?Carte
    {
        return $this->possede;
    }

    public function setPossede(?Carte $possede): self
    {
        $this->possede = $possede;

        return $this;
    }
}
