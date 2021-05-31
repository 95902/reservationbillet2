<?php

namespace App\Entity;

use App\Repository\DestinationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinationsRepository::class)
 */
class Destinations
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
    private $nom_ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_pays;

    /**
     * @ORM\ManyToMany(targetEntity=Voyages::class, mappedBy="destnation")
     */
    private $voyages;

    /**
     * @ORM\ManyToMany(targetEntity=Hotels::class, mappedBy="destination")
     */
    private $hotels;

    /**
     * @ORM\ManyToMany(targetEntity=AgenceLocationVoitures::class, mappedBy="Pays")
     */
    private $agenceLocationVoitures;

    public function __construct()
    {
        $this->voyages = new ArrayCollection();
        $this->hotels = new ArrayCollection();
        $this->agenceLocationVoitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVille(): ?string
    {
        return $this->nom_ville;
    }

    public function setNomVille(string $nom_ville): self
    {
        $this->nom_ville = $nom_ville;

        return $this;
    }

    public function getNomPays(): ?string
    {
        return $this->nom_pays;
    }

    public function setNomPays(string $nom_pays): self
    {
        $this->nom_pays = $nom_pays;

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
            $voyage->addDestnation($this);
        }

        return $this;
    }

    public function removeVoyage(Voyages $voyage): self
    {
        if ($this->voyages->removeElement($voyage)) {
            $voyage->removeDestnation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Hotels[]
     */
    public function getHotels(): Collection
    {
        return $this->hotels;
    }

    public function addHotel(Hotels $hotel): self
    {
        if (!$this->hotels->contains($hotel)) {
            $this->hotels[] = $hotel;
            $hotel->addDestination($this);
        }

        return $this;
    }

    public function removeHotel(Hotels $hotel): self
    {
        if ($this->hotels->removeElement($hotel)) {
            $hotel->removeDestination($this);
        }

        return $this;
    }

    /**
     * @return Collection|AgenceLocationVoitures[]
     */
    public function getAgenceLocationVoitures(): Collection
    {
        return $this->agenceLocationVoitures;
    }

    public function addAgenceLocationVoiture(AgenceLocationVoitures $agenceLocationVoiture): self
    {
        if (!$this->agenceLocationVoitures->contains($agenceLocationVoiture)) {
            $this->agenceLocationVoitures[] = $agenceLocationVoiture;
            $agenceLocationVoiture->addPay($this);
        }

        return $this;
    }

    public function removeAgenceLocationVoiture(AgenceLocationVoitures $agenceLocationVoiture): self
    {
        if ($this->agenceLocationVoitures->removeElement($agenceLocationVoiture)) {
            $agenceLocationVoiture->removePay($this);
        }

        return $this;
    }
}
