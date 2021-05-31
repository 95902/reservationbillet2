<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoituresRepository::class)
 */
class Voitures
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
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=AgenceLocationVoitures::class, mappedBy="voiture")
     */
    private $agenceLocationVoitures;

    public function __construct()
    {
        $this->agenceLocationVoitures = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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
            $agenceLocationVoiture->addVoiture($this);
        }

        return $this;
    }

    public function removeAgenceLocationVoiture(AgenceLocationVoitures $agenceLocationVoiture): self
    {
        if ($this->agenceLocationVoitures->removeElement($agenceLocationVoiture)) {
            $agenceLocationVoiture->removeVoiture($this);
        }

        return $this;
    }
}
