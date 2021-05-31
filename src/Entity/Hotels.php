<?php

namespace App\Entity;

use App\Repository\HotelsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HotelsRepository::class)
 */
class Hotels
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_nuit;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAllInclude;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isSpa;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isWifi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPiscine;

    /**
     * @ORM\ManyToMany(targetEntity=Destinations::class, inversedBy="hotels")
     */
    private $destination;

    /**
     * @ORM\ManyToMany(targetEntity=Voyages::class, mappedBy="hotel")
     */
    private $voyages;

    public function __construct()
    {
        $this->destination = new ArrayCollection();
        $this->voyages = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixNuit(): ?float
    {
        return $this->prix_nuit;
    }

    public function setPrixNuit(float $prix_nuit): self
    {
        $this->prix_nuit = $prix_nuit;

        return $this;
    }

    public function getIsAllInclude(): ?bool
    {
        return $this->isAllInclude;
    }

    public function setIsAllInclude(?bool $isAllInclude): self
    {
        $this->isAllInclude = $isAllInclude;

        return $this;
    }

    public function getIsSpa(): ?bool
    {
        return $this->isSpa;
    }

    public function setIsSpa(?bool $isSpa): self
    {
        $this->isSpa = $isSpa;

        return $this;
    }

    public function getIsWifi(): ?bool
    {
        return $this->isWifi;
    }

    public function setIsWifi(?bool $isWifi): self
    {
        $this->isWifi = $isWifi;

        return $this;
    }

    public function getIsPiscine(): ?bool
    {
        return $this->isPiscine;
    }

    public function setIsPiscine(?bool $isPiscine): self
    {
        $this->isPiscine = $isPiscine;

        return $this;
    }

    /**
     * @return Collection|Destinations[]
     */
    public function getDestination(): Collection
    {
        return $this->destination;
    }

    public function addDestination(Destinations $destination): self
    {
        if (!$this->destination->contains($destination)) {
            $this->destination[] = $destination;
        }

        return $this;
    }

    public function removeDestination(Destinations $destination): self
    {
        $this->destination->removeElement($destination);

        return $this;
    }

    /**
     * @return Collection|Voyages[]
     */
    public function getVoyages(): Collection
    {
        return $this->voyages;
    }

    public function addVoyage(Voyages $voyage): self
    {
        if (!$this->voyages->contains($voyage)) {
            $this->voyages[] = $voyage;
            $voyage->addHotel($this);
        }

        return $this;
    }

    public function removeVoyage(Voyages $voyage): self
    {
        if ($this->voyages->removeElement($voyage)) {
            $voyage->removeHotel($this);
        }

        return $this;
    }
}
