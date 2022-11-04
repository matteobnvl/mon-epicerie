<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegionRepository::class)]
class Region
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomRegion = null;

    #[ORM\Column]
    private ?int $NumeroRegion = null;

    #[ORM\OneToMany(mappedBy: 'IdRegion', targetEntity: Epicerie::class)]
    private Collection $epiceries;

    public function __construct()
    {
        $this->epiceries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRegion(): ?string
    {
        return $this->NomRegion;
    }

    public function setNomRegion(string $NomRegion): self
    {
        $this->NomRegion = $NomRegion;

        return $this;
    }

    public function getNumeroRegion(): ?int
    {
        return $this->NumeroRegion;
    }

    public function setNumeroRegion(int $NumeroRegion): self
    {
        $this->NumeroRegion = $NumeroRegion;

        return $this;
    }

    /**
     * @return Collection<int, Epicerie>
     */
    public function getEpiceries(): Collection
    {
        return $this->epiceries;
    }

    public function addEpicery(Epicerie $epicery): self
    {
        if (!$this->epiceries->contains($epicery)) {
            $this->epiceries->add($epicery);
            $epicery->setIdRegion($this);
        }

        return $this;
    }

    public function removeEpicery(Epicerie $epicery): self
    {
        if ($this->epiceries->removeElement($epicery)) {
            // set the owning side to null (unless already changed)
            if ($epicery->getIdRegion() === $this) {
                $epicery->setIdRegion(null);
            }
        }

        return $this;
    }
}
