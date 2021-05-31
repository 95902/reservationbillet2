<?php

namespace App\Entity;

use App\Repository\TagsProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagsProductRepository::class)
 */
class TagsProduct
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
     * @ORM\ManyToMany(targetEntity=Voyages::class, inversedBy="tagsProducts")
     */
    private $voyage;

    public function __construct()
    {
        $this->voyage = new ArrayCollection();
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
     * @return Collection|Voyages[]
     */
    public function getVoyage(): Collection
    {
        return $this->voyage;
    }

    public function addVoyage(Voyages $voyage): self
    {
        if (!$this->voyage->contains($voyage)) {
            $this->voyage[] = $voyage;
        }

        return $this;
    }

    public function removeVoyage(Voyages $voyage): self
    {
        $this->voyage->removeElement($voyage);

        return $this;
    }
}
