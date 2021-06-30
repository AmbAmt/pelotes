<?php

namespace App\Entity;

use App\Repository\AiguillesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AiguillesRepository::class)
 */
class Aiguilles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $taille;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Marques::class, inversedBy="aiguilles")
     */
    private $marque;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=TypeAiguilles::class, inversedBy="aiguilles")
     */
    private $typeAiguilles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(?string $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getMarque(): ?Marques
    {
        return $this->marque;
    }

    public function setMarque(?Marques $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTypeAiguilles(): ?TypeAiguilles
    {
        return $this->typeAiguilles;
    }

    public function setTypeAiguilles(?TypeAiguilles $typeAiguilles): self
    {
        $this->typeAiguilles = $typeAiguilles;

        return $this;
    }
}
