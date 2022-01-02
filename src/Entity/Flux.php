<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flux
 *
 * @ORM\Table(name="flux", indexes={@ORM\Index(name="IDX_7252313AA76ED395", columns={"user_id"}), @ORM\Index(name="IDX_7252313A5ABF476A", columns={"type_universite_id"}), @ORM\Index(name="IDX_7252313AA6E44244", columns={"pays_id"}), @ORM\Index(name="IDX_7252313A5B4E0609", columns={"niveau_actuel_id"}), @ORM\Index(name="IDX_7252313A7F3310E7", columns={"composant_id"}), @ORM\Index(name="IDX_7252313A2A52F05F", columns={"universite_id"})})
 * @ORM\Entity
 */
class Flux
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="depart", type="date", nullable=false)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="filiere", type="string", length=255, nullable=false)
     */
    private $filiere;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=255, nullable=false)
     */
    private $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_universite", type="string", length=255, nullable=false)
     */
    private $titreUniversite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="detail", type="text", length=0, nullable=true)
     */
    private $detail;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_arrive", type="date", nullable=true)
     */
    private $dateArrive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="suggestion", type="text", length=0, nullable=false)
     */
    private $suggestion;

    /**
     * @var string
     *
     * @ORM\Column(name="boursier", type="string", length=255, nullable=false)
     */
    private $boursier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="projet", type="text", length=0, nullable=true)
     */
    private $projet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etude_poursuite", type="text", length=0, nullable=true)
     */
    private $etudePoursuite;

    /**
     * @var \Universite
     *
     * @ORM\ManyToOne(targetEntity="Universite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="universite_id", referencedColumnName="id")
     * })
     */
    private $universite;

    /**
     * @var \Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="niveau_actuel_id", referencedColumnName="id")
     * })
     */
    private $niveauActuel;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     * })
     */
    private $pays;

    /**
     * @var \TypeUniversite
     *
     * @ORM\ManyToOne(targetEntity="TypeUniversite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_universite_id", referencedColumnName="id")
     * })
     */
    private $typeUniversite;

    /**
     * @var \Composant
     *
     * @ORM\ManyToOne(targetEntity="Composant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="composant_id", referencedColumnName="id")
     * })
     */
    private $composant;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitreUniversite(): ?string
    {
        return $this->titreUniversite;
    }

    public function setTitreUniversite(string $titreUniversite): self
    {
        $this->titreUniversite = $titreUniversite;

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

    public function getDateArrive(): ?\DateTimeInterface
    {
        return $this->dateArrive;
    }

    public function setDateArrive(?\DateTimeInterface $dateArrive): self
    {
        $this->dateArrive = $dateArrive;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getSuggestion(): ?string
    {
        return $this->suggestion;
    }

    public function setSuggestion(string $suggestion): self
    {
        $this->suggestion = $suggestion;

        return $this;
    }

    public function getBoursier(): ?string
    {
        return $this->boursier;
    }

    public function setBoursier(string $boursier): self
    {
        $this->boursier = $boursier;

        return $this;
    }

    public function getProjet(): ?string
    {
        return $this->projet;
    }

    public function setProjet(?string $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    public function getEtudePoursuite(): ?string
    {
        return $this->etudePoursuite;
    }

    public function setEtudePoursuite(?string $etudePoursuite): self
    {
        $this->etudePoursuite = $etudePoursuite;

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

    public function getNiveauActuel(): ?Niveau
    {
        return $this->niveauActuel;
    }

    public function setNiveauActuel(?Niveau $niveauActuel): self
    {
        $this->niveauActuel = $niveauActuel;

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

    public function getTypeUniversite(): ?TypeUniversite
    {
        return $this->typeUniversite;
    }

    public function setTypeUniversite(?TypeUniversite $typeUniversite): self
    {
        $this->typeUniversite = $typeUniversite;

        return $this;
    }

    public function getComposant(): ?Composant
    {
        return $this->composant;
    }

    public function setComposant(?Composant $composant): self
    {
        $this->composant = $composant;

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


}
