<?php

namespace App\Entity;

use App\Repository\TypeAiguillesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeAiguillesRepository::class)
 */
class TypeAiguilles
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
     * @ORM\OneToMany(targetEntity=Aiguilles::class, mappedBy="typeAiguilles")
     */
    private $aiguilles;

    public function __construct()
    {
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
            $aiguille->setTypeAiguilles($this);
        }

        return $this;
    }

    public function removeAiguille(Aiguilles $aiguille): self
    {
        if ($this->aiguilles->removeElement($aiguille)) {
            // set the owning side to null (unless already changed)
            if ($aiguille->getTypeAiguilles() === $this) {
                $aiguille->setTypeAiguilles(null);
            }
        }

        return $this;
    }
}
