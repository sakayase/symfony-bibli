<?php

namespace App\Entity;

use App\Repository\ParametresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParametresRepository::class)
 */
class Parametres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="dateinterval")
     */
    private $duréeEmprunt;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreEmprunt;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantAmende;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuréeEmprunt(): ?\DateInterval
    {
        return $this->duréeEmprunt;
    }

    public function setDuréeEmprunt(\DateInterval $duréeEmprunt): self
    {
        $this->duréeEmprunt = $duréeEmprunt;

        return $this;
    }

    public function getNombreEmprunt(): ?int
    {
        return $this->nombreEmprunt;
    }

    public function setNombreEmprunt(int $nombreEmprunt): self
    {
        $this->nombreEmprunt = $nombreEmprunt;

        return $this;
    }

    public function getMontantAmende(): ?int
    {
        return $this->montantAmende;
    }

    public function setMontantAmende(int $montantAmende): self
    {
        $this->montantAmende = $montantAmende;

        return $this;
    }
}
