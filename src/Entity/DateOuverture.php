<?php

namespace App\Entity;

use App\Repository\DateOuvertureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DateOuvertureRepository::class)]
class DateOuverture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Lundi = null;

    #[ORM\Column(length: 255)]
    private ?string $Mardi = null;

    #[ORM\Column(length: 255)]
    private ?string $Mercredi = null;

    #[ORM\Column(length: 255)]
    private ?string $Jeudi = null;

    #[ORM\Column(length: 255)]
    private ?string $Vendredi = null;

    #[ORM\Column(length: 255)]
    private ?string $Samedi = null;

    #[ORM\Column(length: 255)]
    private ?string $Dimanche = null;

    #[ORM\OneToMany(mappedBy: 'IdDateOuverture', targetEntity: Epicerie::class)]
    private Collection $epiceries;

    public function __construct()
    {
        $this->epiceries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLundi(): ?string
    {
        return $this->Lundi;
    }

    public function setLundi(string $Lundi): self
    {
        $this->Lundi = $Lundi;

        return $this;
    }

    public function getMardi(): ?string
    {
        return $this->Mardi;
    }

    public function setMardi(string $Mardi): self
    {
        $this->Mardi = $Mardi;

        return $this;
    }

    public function getMercredi(): ?string
    {
        return $this->Mercredi;
    }

    public function setMercredi(string $Mercredi): self
    {
        $this->Mercredi = $Mercredi;

        return $this;
    }

    public function getJeudi(): ?string
    {
        return $this->Jeudi;
    }

    public function setJeudi(string $Jeudi): self
    {
        $this->Jeudi = $Jeudi;

        return $this;
    }

    public function getVendredi(): ?string
    {
        return $this->Vendredi;
    }

    public function setVendredi(string $Vendredi): self
    {
        $this->Vendredi = $Vendredi;

        return $this;
    }

    public function getSamedi(): ?string
    {
        return $this->Samedi;
    }

    public function setSamedi(string $Samedi): self
    {
        $this->Samedi = $Samedi;

        return $this;
    }

    public function getDimanche(): ?string
    {
        return $this->Dimanche;
    }

    public function setDimanche(string $Dimanche): self
    {
        $this->Dimanche = $Dimanche;

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
            $epicery->setIdDateOuverture($this);
        }

        return $this;
    }

    public function removeEpicery(Epicerie $epicery): self
    {
        if ($this->epiceries->removeElement($epicery)) {
            // set the owning side to null (unless already changed)
            if ($epicery->getIdDateOuverture() === $this) {
                $epicery->setIdDateOuverture(null);
            }
        }

        return $this;
    }
}
