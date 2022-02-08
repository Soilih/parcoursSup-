<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * FluxSortant
 *
 * @ORM\Table(name="flux_sortant", indexes={@ORM\Index(name="IDX_97076445F74A28F3", columns={"typeuniversite_id"}), @ORM\Index(name="IDX_970764457F3310E7", columns={"composant_id"}), @ORM\Index(name="IDX_97076445B3E9C81", columns={"niveau_id"}), @ORM\Index(name="IDX_97076445A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_97076445A6E44244", columns={"pays_id"})})
 * @ORM\Entity
 */
class FluxSortant 
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
     * @var string
     *
     * @ORM\Column(name="bourse", type="string", length=255, nullable=false)
     */
    private $bourse;

    /**
     * @var string
     *
     * @ORM\Column(name="prise_charche", type="string", length=255, nullable=false)
     */
    private $priseCharche;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="date", nullable=false)
     */
    private $dateDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="universite", type="string", length=255, nullable=false)
     */
    private $universite;

    /**
     * @var string
     *
     * @ORM\Column(name="filiere", type="string", length=255, nullable=false)
     */
    private $filiere;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="famille", type="string", length=255, nullable=true)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="motivation", type="string", length=255, nullable=false)
     */
    private $motivation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suggeston", type="text", length=0, nullable=true)
     */
    private $suggeston;

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

    /**
     * @var \TypeUniversite
     *
     * @ORM\ManyToOne(targetEntity="TypeUniversite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeuniversite_id", referencedColumnName="id")
     * })
     */
    private $typeuniversite;

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
     * @var \Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="niveau_id", referencedColumnName="id")
     * })
     */
    private $niveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBourse(): ?string
    {
        return $this->bourse;
    }

    public function setBourse(string $bourse): self
    {
        $this->bourse = $bourse;

        return $this;
    }

    public function getPriseCharche(): ?string
    {
        return $this->priseCharche;
    }

    public function setPriseCharche(string $priseCharche): self
    {
        $this->priseCharche = $priseCharche;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getUniversite(): ?string
    {
        return $this->universite;
    }

    public function setUniversite(string $universite): self
    {
        $this->universite = $universite;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(?string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(string $motivation): self
    {
        $this->motivation = $motivation;

        return $this;
    }

    public function getSuggeston(): ?string
    {
        return $this->suggeston;
    }

    public function setSuggeston(?string $suggeston): self
    {
        $this->suggeston = $suggeston;

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

    public function getTypeuniversite(): ?TypeUniversite
    {
        return $this->typeuniversite;
    }

    public function setTypeuniversite(?TypeUniversite $typeuniversite): self
    {
        $this->typeuniversite = $typeuniversite;

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

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
