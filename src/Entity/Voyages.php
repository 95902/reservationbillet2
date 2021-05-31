<?php

namespace App\Entity;

use App\Repository\VoyagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoyagesRepository::class)
 */
class Voyages
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
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isSpecialOffert;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToMany(targetEntity=Destinations::class, inversedBy="voyages")
     */
    private $destnation;

    /**
     * @ORM\ManyToMany(targetEntity=Hotels::class, inversedBy="voyages")
     */
    private $hotel;

    /**
     * @ORM\ManyToMany(targetEntity=AgenceLocationVoitures::class, inversedBy="voyages")
     */
    private $voiture_loc;

    public function __construct()
    {
        $this->destnation = new ArrayCollection();
        $this->hotel = new ArrayCollection();
        $this->voiture_loc = new ArrayCollection();
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

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

    public function getIsSpecialOffert(): ?bool
    {
        return $this->isSpecialOffert;
    }

    public function setIsSpecialOffert(?bool $isSpecialOffert): self
    {
        $this->isSpecialOffert = $isSpecialOffert;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * @return Collection|Destinations[]
     */
    public function getDestnation(): Collection
    {
        return $this->destnation;
    }

    public function addDestnation(Destinations $destnation): self
    {
        if (!$this->destnation->contains($destnation)) {
            $this->destnation[] = $destnation;
        }

        return $this;
    }

    public function removeDestnation(Destinations $destnation): self
    {
        $this->destnation->removeElement($destnation);

        return $this;
    }

    /**
     * @return Collection|Hotels[]
     */
    public function getHotel(): Collection
    {
        return $this->hotel;
    }

    public function addHotel(Hotels $hotel): self
    {
        if (!$this->hotel->contains($hotel)) {
            $this->hotel[] = $hotel;
        }

        return $this;
    }

    public function removeHotel(Hotels $hotel): self
    {
        $this->hotel->removeElement($hotel);

        return $this;
    }

    /**
     * @return Collection|AgenceLocationVoitures[]
     */
    public function getVoitureLoc(): Collection
    {
        return $this->voiture_loc;
    }

    public function addVoitureLoc(AgenceLocationVoitures $voitureLoc): self
    {
        if (!$this->voiture_loc->contains($voitureLoc)) {
            $this->voiture_loc[] = $voitureLoc;
        }

        return $this;
    }

    public function removeVoitureLoc(AgenceLocationVoitures $voitureLoc): self
    {
        $this->voiture_loc->removeElement($voitureLoc);

        return $this;
    }
}
