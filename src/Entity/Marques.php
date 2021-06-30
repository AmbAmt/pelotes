<?php

namespace App\Entity;

use App\Repository\MarquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarquesRepository::class)
 */
class Marques
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Pelotes::class, mappedBy="marque")
     */
    private $pelotes;

    /**
     * @ORM\OneToMany(targetEntity=Aiguilles::class, mappedBy="marque")
     */
    private $aiguilles;

    public function __construct()
    {
        $this->pelotes = new ArrayCollection();
        $this->aiguilles = new ArrayCollection();
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

    /**
     * @return Collection|Pelotes[]
     */
    public function getPelotes(): Collection
    {
        return $this->pelotes;
    }

    public function addPelote(Pelotes $pelote): self
    {
        if (!$this->pelotes->contains($pelote)) {
            $this->pelotes[] = $pelote;
            $pelote->setMarque($this);
        }

        return $this;
    }

    public function removePelote(Pelotes $pelote): self
    {
        if ($this->pelotes->removeElement($pelote)) {
            // set the owning side to null (unless already changed)
            if ($pelote->getMarque() === $this) {
                $pelote->setMarque(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Aiguilles[]
     */
    public function getAiguilles(): Collection
    {
        return $this->aiguilles;
    }

    public function addAiguille(Aiguilles $aiguille): self
    {
        if (!$this->aiguilles->contains($aiguille)) {
            $this->aiguilles[] = $aiguille;
            $aiguille->setMarque($this);
        }

        return $this;
    }

    public function removeAiguille(Aiguilles $aiguille): self
    {
        if ($this->aiguilles->removeElement($aiguille)) {
            // set the owning side to null (unless already changed)
            if ($aiguille->getMarque() === $this) {
                $aiguille->setMarque(null);
            }
        }

        return $this;
    }
}
