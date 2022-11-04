<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomProduit = null;

    #[ORM\Column]
    private ?int $PrixProduit = null;

    #[ORM\Column(length: 255)]
    private ?string $DescriptionProduit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PhotoProduit = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?Categorie $Categorie = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?Epicerie $Epicerie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->NomProduit;
    }

    public function setNomProduit(string $NomProduit): self
    {
        $this->NomProduit = $NomProduit;

        return $this;
    }

    public function getPrixProduit(): ?int
    {
        return $this->PrixProduit;
    }

    public function setPrixProduit(int $PrixProduit): self
    {
        $this->PrixProduit = $PrixProduit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->DescriptionProduit;
    }

    public function setDescriptionProduit(string $DescriptionProduit): self
    {
        $this->DescriptionProduit = $DescriptionProduit;

        return $this;
    }

    public function getPhotoProduit(): ?string
    {
        return $this->PhotoProduit;
    }

    public function setPhotoProduit(?string $PhotoProduit): self
    {
        $this->PhotoProduit = $PhotoProduit;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getEpicerie(): ?Epicerie
    {
        return $this->Epicerie;
    }

    public function setIdEpicerie(?Epicerie $Epicerie): self
    {
        $this->Epicerie = $Epicerie;

        return $this;
    }
}
