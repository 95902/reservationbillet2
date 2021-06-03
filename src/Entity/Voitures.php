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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $IsClim;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAuto = true;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isManuel= false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isBagage;

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
    public function __toString()
    {
        return $this->name;
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

    public function getIsClim(): ?bool
    {
        return $this->IsClim;
    }

    public function setIsClim(?bool $IsClim): self
    {
        $this->IsClim = $IsClim;

        return $this;
    }

    public function getIsAuto(): ?bool
    {
        return $this->isAuto;
    }

    public function setIsAuto(bool $isAuto): self
    {
        $this->isAuto = $isAuto;

        return $this;
    }

    public function getIsManuel(): ?bool
    {
        return $this->isManuel;
    }

    public function setIsManuel(?bool $isManuel): self
    {
        $this->isManuel = $isManuel;

        return $this;
    }

    public function getIsBagage(): ?bool
    {
        return $this->isBagage;
    }

    public function setIsBagage(?bool $isBagage): self
    {
        $this->isBagage = $isBagage;

        return $this;
    }
}
