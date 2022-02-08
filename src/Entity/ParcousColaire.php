<?php

namespace App\Entity;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * ParcousColaire
 *
 * @ORM\Table(name="parcous_colaire", indexes={@ORM\Index(name="IDX_282E6DAAA76ED395", columns={"user_id"}), @ORM\Index(name="IDX_282E6DAAB3E9C81", columns={"niveau_id"}), @ORM\Index(name="IDX_282E6DAA77EF1B1E", columns={"ecole_id"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class ParcousColaire
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
     * @ORM\Column(name="anne_obtention_bac", type="date", nullable=false)
     */
    private $anneObtentionBac;

    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string", length=255, nullable=false)
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="mention", type="string", length=255, nullable=false)
     */
    private $mention;

    /**
     * @var string
     *
     * @ORM\Column(name="moyenne", type="string", length=255, nullable=false)
     */
    private $moyenne;

    /**
     * @var string
     *
     * @ORM\Column(name="releve", type="string", length=255, nullable=false)
     */
    private $releve;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="releve")
     * @var File
     */
    private $imageFile;

   
    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", length=0, nullable=true)
     */
    private $commentaire;

    /**
     * @var \Ecole
     *
     * @ORM\ManyToOne(targetEntity="Ecole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ecole_id", referencedColumnName="id")
     * })
     */
    private $ecole;

    /**
     * @var \Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="niveau_id", referencedColumnName="id")
     * })
     */
    private $niveau;

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

    public function getAnneObtentionBac(): ?\DateTimeInterface
    {
        return $this->anneObtentionBac;
    }

    public function setAnneObtentionBac(\DateTimeInterface $anneObtentionBac): self
    {
        $this->anneObtentionBac = $anneObtentionBac;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;

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

    public function getMoyenne(): ?string
    {
        return $this->moyenne;
    }

    public function setMoyenne(string $moyenne): self
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    public function getReleve(): ?string
    {
        return $this->releve;
    }

    public function setReleve(string $releve): self
    {
        $this->releve = $releve;

        return $this;
    }

    public function getAttestation(): ?string
    {
        return $this->attestation;
    }

    public function setAttestation(string $attestation): self
    {
        $this->attestation = $attestation;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getEcole(): ?Ecole
    {
        return $this->ecole;
    }

    public function setEcole(?Ecole $ecole): self
    {
        $this->ecole = $ecole;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function setImageFile(File $releve = null)
    {
        $this->imageFile = $releve;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($releve) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

   

    

   


}
