<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $auteur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anneeEdition;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombrePages;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $nomEditeur;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $cote;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $ISBN;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $etat;

    /**
     * @ORM\OneToMany(targetEntity=Emprunt::class, mappedBy="livre")
     */
    private $emprunts;

    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(?string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getAnneeEdition(): ?int
    {
        return $this->anneeEdition;
    }

    public function setAnneeEdition(?int $anneeEdition): self
    {
        $this->anneeEdition = $anneeEdition;

        return $this;
    }

    public function getNombrePages(): ?int
    {
        return $this->nombrePages;
    }

    public function setNombrePages(?int $nombrePages): self
    {
        $this->nombrePages = $nombrePages;

        return $this;
    }

    public function getNomEditeur(): ?string
    {
        return $this->nomEditeur;
    }

    public function setNomEditeur(?string $nomEditeur): self
    {
        $this->nomEditeur = $nomEditeur;

        return $this;
    }

    public function getCote(): ?string
    {
        return $this->cote;
    }

    public function setCote(string $cote): self
    {
        $this->cote = $cote;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(string $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection|Emprunt[]
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): self
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts[] = $emprunt;
            $emprunt->addLivre($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        if ($this->emprunts->removeElement($emprunt)) {
            $emprunt->removeLivre($this);
        }

        return $this;
    }
}
