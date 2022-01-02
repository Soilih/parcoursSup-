<?php

namespace App\Entity;

use App\Repository\TypeUniversiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeUniversiteRepository::class)
 */
class TypeUniversite
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Universite::class, mappedBy="type")
     */
    private $universites;

    /**
     * @ORM\OneToMany(targetEntity=Flux::class, mappedBy="typeUniversite")
     */
    private $fluxes;

    /**
     * @ORM\OneToMany(targetEntity=FluxSortant::class, mappedBy="typeuniversite")
     */
    private $fluxSortants;

    public function __construct()
    {
        $this->universites = new ArrayCollection();
        $this->fluxes = new ArrayCollection();
        $this->fluxSortants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Universite[]
     */
    public function getUniversites(): Collection
    {
        return $this->universites;
    }

    public function addUniversite(Universite $universite): self
    {
        if (!$this->universites->contains($universite)) {
            $this->universites[] = $universite;
            $universite->setType($this);
        }

        return $this;
    }

    public function removeUniversite(Universite $universite): self
    {
        if ($this->universites->removeElement($universite)) {
            // set the owning side to null (unless already changed)
            if ($universite->getType() === $this) {
                $universite->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Flux[]
     */
    public function getFluxes(): Collection
    {
        return $this->fluxes;
    }

    public function addFlux(Flux $flux): self
    {
        if (!$this->fluxes->contains($flux)) {
            $this->fluxes[] = $flux;
            $flux->setTypeUniversite($this);
        }

        return $this;
    }

    public function removeFlux(Flux $flux): self
    {
        if ($this->fluxes->removeElement($flux)) {
            // set the owning side to null (unless already changed)
            if ($flux->getTypeUniversite() === $this) {
                $flux->setTypeUniversite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FluxSortant[]
     */
    public function getFluxSortants(): Collection
    {
        return $this->fluxSortants;
    }

    public function addFluxSortant(FluxSortant $fluxSortant): self
    {
        if (!$this->fluxSortants->contains($fluxSortant)) {
            $this->fluxSortants[] = $fluxSortant;
            $fluxSortant->setTypeuniversite($this);
        }

        return $this;
    }

    public function removeFluxSortant(FluxSortant $fluxSortant): self
    {
        if ($this->fluxSortants->removeElement($fluxSortant)) {
            // set the owning side to null (unless already changed)
            if ($fluxSortant->getTypeuniversite() === $this) {
                $fluxSortant->setTypeuniversite(null);
            }
        }

        return $this;
    }
}
