<?php

namespace App\Entity;

use App\Repository\RelatedVoyageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RelatedVoyageRepository::class)
 */
class RelatedVoyage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Voyages::class, inversedBy="relatedVoyages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoyage(): ?Voyages
    {
        return $this->voyage;
    }

    public function setVoyage(?Voyages $voyage): self
    {
        $this->voyage = $voyage;

        return $this;
    }
}
