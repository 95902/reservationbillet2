<?php

namespace App\Entity;

use App\Repository\AgenceLocationVoituresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenceLocationVoituresRepository::class)
 */
class AgenceLocationVoitures
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
    private $prix_jours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Voitures::class, inversedBy="agenceLocationVoitures")
     */
    private $voiture;

    public function __construct()
    {
        $this->voiture = new ArrayCollection();
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

    public function getPrixJours(): ?float
    {
        return $this->prix_jours;
    }

    public function setPrixJours(float $prix_jours): self
    {
        $this->prix_jours = $prix_jours;

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
     * @return Collection|Voitures[]
     */
    public function getVoiture(): Collection
    {
        return $this->voiture;
    }

    public function addVoiture(Voitures $voiture): self
    {
        if (!$this->voiture->contains($voiture)) {
            $this->voiture[] = $voiture;
        }

        return $this;
    }

    public function removeVoiture(Voitures $voiture): self
    {
        $this->voiture->removeElement($voiture);

        return $this;
    }
}
