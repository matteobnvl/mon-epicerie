<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomType = null;

    #[ORM\OneToMany(mappedBy: 'IdType', targetEntity: Epicerie::class)]
    private Collection $epiceries;

    public function __construct()
    {
        $this->epiceries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomType(): ?string
    {
        return $this->NomType;
    }

    public function setNomType(string $NomType): self
    {
        $this->NomType = $NomType;

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
            $epicery->setIdType($this);
        }

        return $this;
    }

    public function removeEpicery(Epicerie $epicery): self
    {
        if ($this->epiceries->removeElement($epicery)) {
            // set the owning side to null (unless already changed)
            if ($epicery->getIdType() === $this) {
                $epicery->setIdType(null);
            }
        }

        return $this;
    }
}
