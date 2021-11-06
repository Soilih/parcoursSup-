<?php

namespace App\Entity;

use App\Repository\ParcoursUniversitaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParcoursUniversitaireRepository::class)
 */
class ParcoursUniversitaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $AnneInscription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filiere;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="parcoursUniversitaires")
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mention;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fichier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moyenne;

    /**
     * @ORM\ManyToOne(targetEntity=Universite::class, inversedBy="parcoursUniversitaires")
     */
    private $universite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreUniveriste;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="parcoursUniversitaires")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneInscription(): ?\DateTimeInterface
    {
        return $this->AnneInscription;
    }

    public function setAnneInscription(\DateTimeInterface $AnneInscription): self
    {
        $this->AnneInscription = $AnneInscription;

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

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

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

    public function getUniversite(): ?Universite
    {
        return $this->universite;
    }

    public function setUniversite(?Universite $universite): self
    {
        $this->universite = $universite;

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
