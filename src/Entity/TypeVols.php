<?php

namespace App\Entity;

use App\Repository\TypeVolsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeVolsRepository::class)
 */
class TypeVols
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
     * @ORM\ManyToMany(targetEntity=Vols::class, mappedBy="type_vole")
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
            $vol->addTypeVole($this);
        }

        return $this;
    }

    public function removeVol(Vols $vol): self
    {
        if ($this->vols->removeElement($vol)) {
            $vol->removeTypeVole($this);
        }

        return $this;
    }
}
