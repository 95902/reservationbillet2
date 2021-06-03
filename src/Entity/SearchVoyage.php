<?php

namespace App\Entity;

class SearchVoyage
{
    
    private $minprix =null;

  
    private $maxprix =null;

    /** 
    * @var Destinations[]
    */
    private $destination = [];

    
    private $tag=null;

  
    private $duree=null;

    /** 
    * @var type_vole[]
    */
    private $type_vole = [];

    
    /** 
    * @var type_vehicule[]
    */
    private $type_vehicule = [];

    public function getminprix(): ?int
    {
        return $this->minprix;
    }

    public function setminprix(?int $minprix): self
    {
        $this->minprix = $minprix;

        return $this;
    }

    public function getmaxprix(): ?int
    {
        return $this->maxprix;
    }

    public function setmaxprix(?int $maxprix): self
    {
        $this->maxprix = $maxprix;

        return $this;
    }

    public function getDestination(): ?array
    {
        return $this->destination;
    }

    public function setDestination(?array $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(?string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTypeVole(): ?array
    {
        return $this->type_vole;
    }

    public function setTypeVole(?array $type_vole): self
    {
        $this->type_vole = $type_vole;

        return $this;
    }

    public function getTypeVehicule(): ?array
    {
        return $this->type_vehicule;
    }

    public function setTypeVehicule(?array $type_vehicule): self
    {
        $this->type_vehicule = $type_vehicule;

        return $this;
    }
}
