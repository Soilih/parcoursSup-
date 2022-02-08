<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * ParcoursUniversitaire
 *
 * @ORM\Table(name="parcours_universitaire", indexes={@ORM\Index(name="IDX_996FC494A6E44244", columns={"pays_id"}), @ORM\Index(name="IDX_996FC4942A52F05F", columns={"universite_id"}), @ORM\Index(name="IDX_996FC494A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_996FC494B3E9C81", columns={"niveau_id"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class ParcoursUniversitaire
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
     * @ORM\Column(name="anne_inscription", type="date", nullable=false)
     */
    private $anneInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="filiere", type="string", length=255, nullable=false)
     */
    private $filiere;

    /**
     * @var string
     *
     * @ORM\Column(name="mention", type="string", length=255, nullable=false)
     */
    private $mention;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=255, nullable=false)
     */
    private $fichier;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="fichier")
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255, nullable=false)
     */
    private $detail;

    /**
     * @var string
     *
     * @ORM\Column(name="moyenne", type="string", length=255, nullable=false)
     */
    private $moyenne;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_univeriste", type="string", length=255, nullable=false)
     */
    private $titreUniveriste;

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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

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

    public function getAnneInscription(): ?\DateTimeInterface
    {
        return $this->anneInscription;
    }

    public function setAnneInscription(\DateTimeInterface $anneInscription): self
    {
        $this->anneInscription = $anneInscription;

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

    public function getMention(): ?string
    {
        return $this->mention;
    }

    public function setMention(string $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

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

    public function getMoyenne(): ?string
    {
        return $this->moyenne;
    }

    public function setMoyenne(string $moyenne): self
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    public function getTitreUniveriste(): ?string
    {
        return $this->titreUniveriste;
    }

    public function setTitreUniveriste(string $titreUniveriste): self
    {
        $this->titreUniveriste = $titreUniveriste;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function setImageFile(File $fichier = null)
    {
        $this->imageFile = $fichier;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($fichier) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }


}
