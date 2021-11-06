<?php

namespace App\Entity;

use App\Repository\TypeUniversiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeUniversiteRepository::class)
 */
class TypeUniversite
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
     * @ORM\OneToMany(targetEntity=Universite::class, mappedBy="type")
     */
    private $universites;

    public function __construct()
    {
        $this->universites = new ArrayCollection();
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

    /**
     * @return Collection|Universite[]
     */
    public function getUniversites(): Collection
    {
        return $this->universites;
    }

    public function addUniversite(Universite $universite): self
    {
        if (!$this->universites->contains($universite)) {
            $this->universites[] = $universite;
            $universite->setType($this);
        }

        return $this;
    }

    public function removeUniversite(Universite $universite): self
    {
        if ($this->universites->removeElement($universite)) {
            // set the owning side to null (unless already changed)
            if ($universite->getType() === $this) {
                $universite->setType(null);
            }
        }

        return $this;
    }
}
