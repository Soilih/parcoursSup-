<?php

namespace App\Entity;

use App\Repository\ParcousColaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParcousColaireRepository::class)
 */
class ParcousColaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Ecole::class, inversedBy="parcousColaires")
     */
    private $ecole;

    /**
     * @ORM\Column(type="date")
     */
    private $anneObtentionBac;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $serie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mention;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moyenne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $releve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $attestation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="parcousColaires")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
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
