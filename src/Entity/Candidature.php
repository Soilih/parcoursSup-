<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatureRepository::class)
 */
class Candidature
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $soumission;

    /**
     * @ORM\Column(type="boolean")
     */
    private $valider;

    /**
     * @ORM\Column(type="boolean")
     */
    private $transmission;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="candidatures")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?float
    {
        return $this->status;
    }

    public function setStatus(float $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSoumission(): ?bool
    {
        return $this->soumission;
    }

    public function setSoumission(bool $soumission): self
    {
        $this->soumission = $soumission;

        return $this;
    }

    public function getValider(): ?bool
    {
        return $this->valider;
    }

    public function setValider(bool $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    public function getTransmission(): ?bool
    {
        return $this->transmission;
    }

    public function setTransmission(bool $transmission): self
    {
        $this->transmission = $transmission;

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
