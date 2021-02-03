<?php

namespace App\Entity;

use App\Repository\EmprunteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmprunteurRepository::class)
 */
class Emprunteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $blacklist;

    /**
     * @ORM\Column(type="boolean")
     */
    private $carte;

    /**
     * @ORM\OneToMany(targetEntity=Emprunt::class, mappedBy="emprunteur")
     */
    private $emprunt;

    public function __construct()
    {
        $this->emprunt = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getBlacklist(): ?bool
    {
        return $this->blacklist;
    }

    public function setBlacklist(bool $blacklist): self
    {
        $this->blacklist = $blacklist;

        return $this;
    }

    public function getCarte(): ?bool
    {
        return $this->carte;
    }

    public function setCarte(bool $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

    /**
     * @return Collection|Emprunt[]
     */
    public function getEmprunt(): Collection
    {
        return $this->emprunt;
    }

    public function addEmprunt(Emprunt $emprunt): self
    {
        if (!$this->emprunt->contains($emprunt)) {
            $this->emprunt[] = $emprunt;
            $emprunt->setEmprunteur($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        if ($this->emprunt->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getEmprunteur() === $this) {
                $emprunt->setEmprunteur(null);
            }
        }

        return $this;
    }
}
