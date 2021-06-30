<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PelotesRepository;
use Symfony\component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=PelotesRepository::class)
 * @Vich\Uploadable
 */
class Pelotes
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $matiere;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $tailleAiguille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurNom;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $couleur_numero;

    /**
     * @ORM\ManyToOne(targetEntity=Marques::class, inversedBy="pelotes")
     */
    private $marque;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $longeure;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $grammage;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $echantillon;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $quantite;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModif;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomImage;

    /**
     * @Vich\UploadableField(mapping="pelotes_image", fileNameProperty="nomImage")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

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

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(?string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getTailleAiguille(): ?string
    {
        return $this->tailleAiguille;
    }

    public function setTailleAiguille(string $tailleAiguille): self
    {
        $this->tailleAiguille = $tailleAiguille;

        return $this;
    }

    public function getCouleurNom(): ?string
    {
        return $this->couleurNom;
    }

    public function setCouleurNom(?string $couleurNom): self
    {
        $this->couleurNom = $couleurNom;

        return $this;
    }

    public function getCouleurNumero(): ?string
    {
        return $this->couleur_numero;
    }

    public function setCouleurNumero(?string $couleur_numero): self
    {
        $this->couleur_numero = $couleur_numero;

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

    public function getLongeure(): ?string
    {
        return $this->longeure;
    }

    public function setLongeure(?string $longeure): self
    {
        $this->longeure = $longeure;

        return $this;
    }

    public function getGrammage(): ?string
    {
        return $this->grammage;
    }

    public function setGrammage(?string $grammage): self
    {
        $this->grammage = $grammage;

        return $this;
    }

    public function getEchantillon(): ?string
    {
        return $this->echantillon;
    }

    public function setEchantillon(?string $echantillon): self
    {
        $this->echantillon = $echantillon;

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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateModif(): ?\DateTimeInterface
    {
        return $this->dateModif;
    }

    public function setDateModif(\DateTimeInterface $dateModif): self
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    public function getNomImage(): ?string
    {
        return $this->nomImage;
    }

    public function setNomImage(?string $nomImage): self
    {
        $this->nomImage = $nomImage;

        return $this;
    }

    public function getImageFile(): ?File {
        return $this->imageFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): self {
        $this->imageFile = $imageFile;
        if($this->imageFile instanceof UploadedFile){
            $this->dateModif= new DateTime;
        }
        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
