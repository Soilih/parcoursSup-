<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
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
     * @ORM\OneToMany(targetEntity=Universite::class, mappedBy="pays")
     */
    private $universites;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="pays")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Flux::class, mappedBy="pays")
     */
    private $fluxes;

    public function __construct()
    {
        $this->universites = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->fluxes = new ArrayCollection();
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
            $universite->setPays($this);
        }

        return $this;
    }

    public function removeUniversite(Universite $universite): self
    {
        if ($this->universites->removeElement($universite)) {
            // set the owning side to null (unless already changed)
            if ($universite->getPays() === $this) {
                $universite->setPays(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setPays($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getPays() === $this) {
                $experience->setPays(null);
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
            $flux->setPays($this);
        }

        return $this;
    }

    public function removeFlux(Flux $flux): self
    {
        if ($this->fluxes->removeElement($flux)) {
            // set the owning side to null (unless already changed)
            if ($flux->getPays() === $this) {
                $flux->setPays(null);
            }
        }

        return $this;
    }
}
