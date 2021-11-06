<?php

namespace App\Entity;

use App\Repository\FluxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FluxRepository::class)
 */
class Flux
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
    private $type;

    /**
     * @ORM\Column(type="date")
     */
    private $depart;

    /**
     * @ORM\ManyToOne(targetEntity=Universite::class, inversedBy="fluxes")
     */
    private $universite;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="fluxes")
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diplome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="fluxes")
     */
    private $niveauActuel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreUniversite;

    /**
     * @ORM\ManyToOne(targetEntity=Flux::class, inversedBy="fluxes")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Flux::class, mappedBy="user")
     */
    private $fluxes;

    public function __construct()
    {
        $this->fluxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDepart(): ?\DateTimeInterface
    {
        return $this->depart;
    }

    public function setDepart(\DateTimeInterface $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getUniversite(): ?Universite
    {
        return $this->universite;
    }

    public function setUniversite(?Universite $universite): self
    {
        $this->universite = $universite;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getFiliere(): ?string
    {
        return $this->filiere;
    }

    public function setFiliere(string $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNiveauActuel(): ?Niveau
    {
        return $this->niveauActuel;
    }

    public function setNiveauActuel(?Niveau $niveauActuel): self
    {
        $this->niveauActuel = $niveauActuel;

        return $this;
    }

    public function getTitreUniversite(): ?string
    {
        return $this->titreUniversite;
    }

    public function setTitreUniversite(string $titreUniversite): self
    {
        $this->titreUniversite = $titreUniversite;

        return $this;
    }

    public function getUser(): ?self
    {
        return $this->user;
    }

    public function setUser(?self $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getFluxes(): Collection
    {
        return $this->fluxes;
    }

    public function addFlux(self $flux): self
    {
        if (!$this->fluxes->contains($flux)) {
            $this->fluxes[] = $flux;
            $flux->setUser($this);
        }

        return $this;
    }

    public function removeFlux(self $flux): self
    {
        if ($this->fluxes->removeElement($flux)) {
            // set the owning side to null (unless already changed)
            if ($flux->getUser() === $this) {
                $flux->setUser(null);
            }
        }

        return $this;
    }
}
