<?php

namespace App\Entity;

use App\Repository\EcoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EcoleRepository::class)
 */
class Ecole
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
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ile;

    /**
     * @ORM\OneToMany(targetEntity=ParcousColaire::class, mappedBy="ecole")
     */
    private $parcousColaires;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ecoles")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomChef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TypeEcole;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $site;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Commune;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Fax;

    public function __construct()
    {
        $this->parcousColaires = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

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

    public function getIle(): ?string
    {
        return $this->ile;
    }

    public function setIle(string $ile): self
    {
        $this->ile = $ile;

        return $this;
    }

    /**
     * @return Collection|ParcousColaire[]
     */
    public function getParcousColaires(): Collection
    {
        return $this->parcousColaires;
    }

    public function addParcousColaire(ParcousColaire $parcousColaire): self
    {
        if (!$this->parcousColaires->contains($parcousColaire)) {
            $this->parcousColaires[] = $parcousColaire;
            $parcousColaire->setEcole($this);
        }

        return $this;
    }

    public function removeParcousColaire(ParcousColaire $parcousColaire): self
    {
        if ($this->parcousColaires->removeElement($parcousColaire)) {
            // set the owning side to null (unless already changed)
            if ($parcousColaire->getEcole() === $this) {
                $parcousColaire->setEcole(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNomChef(): ?string
    {
        return $this->NomChef;
    }

    public function setNomChef(string $NomChef): self
    {
        $this->NomChef = $NomChef;

        return $this;
    }

    public function getTypeEcole(): ?string
    {
        return $this->TypeEcole;
    }

    public function setTypeEcole(string $TypeEcole): self
    {
        $this->TypeEcole = $TypeEcole;

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
        return $this->Postal;
    }

    public function setPostal(?float $Postal): self
    {
        $this->Postal = $Postal;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->Commune;
    }

    public function setCommune(string $Commune): self
    {
        $this->Commune = $Commune;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }
}
