<?php

namespace App\Entity;

use App\Repository\PhotoEpicerieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoEpicerieRepository::class)]
class PhotoEpicerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomPhoto = null;

    #[ORM\Column(length: 255)]
    private ?string $LienPhoto = null;

    #[ORM\ManyToOne(inversedBy: 'photoEpiceries')]
    private ?Epicerie $Epicerie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPhoto(): ?string
    {
        return $this->NomPhoto;
    }

    public function setNomPhoto(string $NomPhoto): self
    {
        $this->NomPhoto = $NomPhoto;

        return $this;
    }

    public function getLienPhoto(): ?string
    {
        return $this->LienPhoto;
    }

    public function setLienPhoto(string $LienPhoto): self
    {
        $this->LienPhoto = $LienPhoto;

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
