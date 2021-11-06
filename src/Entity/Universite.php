<?php

namespace App\Entity;

use App\Repository\UniversiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UniversiteRepository::class)
 */
class Universite
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
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $detail;

    /**
     * @ORM\Column(type="text")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $site;

    /**
     * @ORM\Column(type="float")
     */
    private $postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="universites")
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filiale;

    /**
     * @ORM\ManyToOne(targetEntity=TypeUniversite::class, inversedBy="universites")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=ParcoursUniversitaire::class, mappedBy="universite")
     */
    private $parcoursUniversitaires;

    /**
     * @ORM\OneToMany(targetEntity=Flux::class, mappedBy="universite")
     */
    private $fluxes;

    public function __construct()
    {
        $this->parcoursUniversitaires = new ArrayCollection();
        $this->fluxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getPostal(): ?float
    {
        return $this->postal;
    }

    public function setPostal(float $postal): self
    {
        $this->postal = $postal;

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

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getFiliale(): ?string
    {
        return $this->filiale;
    }

    public function setFiliale(?string $filiale): self
    {
        $this->filiale = $filiale;

        return $this;
    }

    public function getType(): ?TypeUniversite
    {
        return $this->type;
    }

    public function setType(?TypeUniversite $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|ParcoursUniversitaire[]
     */
    public function getParcoursUniversitaires(): Collection
    {
        return $this->parcoursUniversitaires;
    }

    public function addParcoursUniversitaire(ParcoursUniversitaire $parcoursUniversitaire): self
    {
        if (!$this->parcoursUniversitaires->contains($parcoursUniversitaire)) {
            $this->parcoursUniversitaires[] = $parcoursUniversitaire;
            $parcoursUniversitaire->setUniversite($this);
        }

        return $this;
    }

    public function removeParcoursUniversitaire(ParcoursUniversitaire $parcoursUniversitaire): self
    {
        if ($this->parcoursUniversitaires->removeElement($parcoursUniversitaire)) {
            // set the owning side to null (unless already changed)
            if ($parcoursUniversitaire->getUniversite() === $this) {
                $parcoursUniversitaire->setUniversite(null);
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
            $flux->setUniversite($this);
        }

        return $this;
    }

    public function removeFlux(Flux $flux): self
    {
        if ($this->fluxes->removeElement($flux)) {
            // set the owning side to null (unless already changed)
            if ($flux->getUniversite() === $this) {
                $flux->setUniversite(null);
            }
        }

        return $this;
    }
}
