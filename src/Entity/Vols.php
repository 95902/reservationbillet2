<?php

namespace App\Entity;

use App\Repository\VolsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VolsRepository::class)
 */
class Vols
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Destinations::class, inversedBy="vols")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Ville_depart;

    /**
     * @ORM\ManyToOne(targetEntity=Destinations::class, inversedBy="vol_arrive")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville_Arrive;

    /**
     * @ORM\ManyToMany(targetEntity=Compagnies::class, inversedBy="vols")
     */
    private $compagny;

    /**
     * @ORM\ManyToMany(targetEntity=TypeVols::class, inversedBy="vols")
     */
    private $type_vol;

    public function __construct()
    {
        $this->compagny = new ArrayCollection();
        $this->type_vol = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleDepart(): ?Destinations
    {
        return $this->Ville_depart;
    }

    public function setVilleDepart(?Destinations $Ville_depart): self
    {
        $this->Ville_depart = $Ville_depart;

        return $this;
    }

    public function getVilleArrive(): ?Destinations
    {
        return $this->ville_Arrive;
    }

    public function setVilleArrive(?Destinations $ville_Arrive): self
    {
        $this->ville_Arrive = $ville_Arrive;

        return $this;
    }

    /**
     * @return Collection|Compagnies[]
     */
    public function getCompagny(): Collection
    {
        return $this->compagny;
    }

    public function addCompagny(Compagnies $compagny): self
    {
        if (!$this->compagny->contains($compagny)) {
            $this->compagny[] = $compagny;
        }

        return $this;
    }

    public function removeCompagny(Compagnies $compagny): self
    {
        $this->compagny->removeElement($compagny);

        return $this;
    }

    /**
     * @return Collection|TypeVols[]
     */
    public function getTypeVol(): Collection
    {
        return $this->type_vol;
    }

    public function addTypeVol(TypeVols $typeVol): self
    {
        if (!$this->type_vol->contains($typeVol)) {
            $this->type_vol[] = $typeVol;
        }

        return $this;
    }

    public function removeTypeVol(TypeVols $typeVol): self
    {
        $this->type_vol->removeElement($typeVol);

        return $this;
    }
}
