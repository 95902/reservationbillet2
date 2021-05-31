<?php

namespace App\Entity;

use App\Repository\CompagniesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompagniesRepository::class)
 */
class Compagnies
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Vols::class, mappedBy="compagny")
     */
    private $vols;

    public function __construct()
    {
        $this->vols = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Vols[]
     */
    public function getVols(): Collection
    {
        return $this->vols;
    }

    public function addVol(Vols $vol): self
    {
        if (!$this->vols->contains($vol)) {
            $this->vols[] = $vol;
            $vol->addCompagny($this);
        }

        return $this;
    }

    public function removeVol(Vols $vol): self
    {
        if ($this->vols->removeElement($vol)) {
            $vol->removeCompagny($this);
        }

        return $this;
    }


}
