<?php

namespace App\Entity;

use App\Repository\GestionnaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=GestionnaireRepository::class)
 * @UniqueEntity(fields={"iden_ges"}, message="There is already an account with this iden_ges")
 */
class Gestionnaire implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $iden_ges;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_ges;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pren_ges;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateurs::class, inversedBy="gestionnaires")
     */
    private $gere;

    public function __construct()
    {
        $this->gere = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdenGes(): ?string
    {
        return $this->iden_ges;
    }

    public function setIdenGes(string $iden_ges): self
    {
        $this->iden_ges = $iden_ges;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->iden_ges;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->iden_ges;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNomGes(): ?string
    {
        return $this->nom_ges;
    }

    public function setNomGes(string $nom_ges): self
    {
        $this->nom_ges = $nom_ges;

        return $this;
    }

    public function getPrenGes(): ?string
    {
        return $this->pren_ges;
    }

    public function setPrenGes(string $pren_ges): self
    {
        $this->pren_ges = $pren_ges;

        return $this;
    }

    /**
     * @return Collection|Utilisateurs[]
     */
    public function getGere(): Collection
    {
        return $this->gere;
    }

    public function addGere(Utilisateurs $gere): self
    {
        if (!$this->gere->contains($gere)) {
            $this->gere[] = $gere;
        }

        return $this;
    }

    public function removeGere(Utilisateurs $gere): self
    {
        $this->gere->removeElement($gere);

        return $this;
    }
}
