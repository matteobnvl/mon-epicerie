<?php

namespace App\Entity;

use App\Repository\EpicerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpicerieRepository::class)]
class Epicerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomEpicerie = null;

    #[ORM\Column]
    private ?int $NumeroRueEpicerie = null;

    #[ORM\Column(length: 255)]
    private ?string $NomRueEpicerie = null;

    #[ORM\Column(length: 255)]
    private ?string $CodePostalEpicerie = null;

    #[ORM\Column(length: 255)]
    private ?string $VilleEpicerie = null;

    #[ORM\Column(nullable: true)]
    private ?bool $FraisLivraison = null;

    #[ORM\ManyToOne(inversedBy: 'epiceries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Region $Region = null;

    #[ORM\ManyToOne(inversedBy: 'epiceries')]
    private ?DateOuverture $DateOuverture = null;

    #[ORM\ManyToOne(inversedBy: 'epiceries')]
    private ?Type $Type = null;

    #[ORM\OneToMany(mappedBy: 'IdEpicerie', targetEntity: Produit::class)]
    private Collection $produits;

    #[ORM\OneToMany(mappedBy: 'IdEpicerie', targetEntity: PhotoEpicerie::class)]
    private Collection $photoEpiceries;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->photoEpiceries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEpicerie(): ?string
    {
        return $this->NomEpicerie;
    }

    public function setNomEpicerie(string $NomEpicerie): self
    {
        $this->NomEpicerie = $NomEpicerie;

        return $this;
    }

    public function getNumeroRueEpicerie(): ?int
    {
        return $this->NumeroRueEpicerie;
    }

    public function setNumeroRueEpicerie(int $NumeroRueEpicerie): self
    {
        $this->NumeroRueEpicerie = $NumeroRueEpicerie;

        return $this;
    }

    public function getNomRueEpicerie(): ?string
    {
        return $this->NomRueEpicerie;
    }

    public function setNomRueEpicerie(string $NomRueEpicerie): self
    {
        $this->NomRueEpicerie = $NomRueEpicerie;

        return $this;
    }

    public function getCodePostalEpicerie(): ?string
    {
        return $this->CodePostalEpicerie;
    }

    public function setCodePostalEpicerie(string $CodePostalEpicerie): self
    {
        $this->CodePostalEpicerie = $CodePostalEpicerie;

        return $this;
    }

    public function getVilleEpicerie(): ?string
    {
        return $this->VilleEpicerie;
    }

    public function setVilleEpicerie(string $VilleEpicerie): self
    {
        $this->VilleEpicerie = $VilleEpicerie;

        return $this;
    }

    public function isFraisLivraison(): ?bool
    {
        return $this->FraisLivraison;
    }

    public function setFraisLivraison(?bool $FraisLivraison): self
    {
        $this->FraisLivraison = $FraisLivraison;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->Region;
    }

    public function setRegion(?Region $Region): self
    {
        $this->Region = $Region;

        return $this;
    }

    public function getDateOuverture(): ?DateOuverture
    {
        return $this->DateOuverture;
    }

    public function setDateOuverture(?DateOuverture $DateOuverture): self
    {
        $this->DateOuverture = $DateOuverture;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->Type;
    }

    public function setType(?Type $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setIdEpicerie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getIdEpicerie() === $this) {
                $produit->setIdEpicerie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PhotoEpicerie>
     */
    public function getPhotoEpiceries(): Collection
    {
        return $this->photoEpiceries;
    }

    public function addPhotoEpicery(PhotoEpicerie $photoEpicery): self
    {
        if (!$this->photoEpiceries->contains($photoEpicery)) {
            $this->photoEpiceries->add($photoEpicery);
            $photoEpicery->setIdEpicerie($this);
        }

        return $this;
    }

    public function removePhotoEpicery(PhotoEpicerie $photoEpicery): self
    {
        if ($this->photoEpiceries->removeElement($photoEpicery)) {
            // set the owning side to null (unless already changed)
            if ($photoEpicery->getIdEpicerie() === $this) {
                $photoEpicery->setIdEpicerie(null);
            }
        }

        return $this;
    }
}
