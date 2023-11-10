<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)] 
class Candidat
{
    #[ORM\Id] 
    #[ORM\Column]
    private ?int $cin = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(nullable: true)]
    private ?int $experience = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\OneToMany(mappedBy: 'candidat', targetEntity: Entretien::class)]
    private Collection $entretien;

    public function __construct()
    {
        $this->entretien = new ArrayCollection();
    }
 

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin) : static
    {
        $this->cin = $cin;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * @return Collection<int, Entretien>
     */
    public function getEntretien(): Collection
    {
        return $this->entretien;
    }

    public function addEntretien(Entretien $entretien): static
    {
        if (!$this->entretien->contains($entretien)) {
            $this->entretien->add($entretien);
            $entretien->setCandidat($this);
        }

        return $this;
    }

    public function removeEntretien(Entretien $entretien): static
    {
        if ($this->entretien->removeElement($entretien)) {
            // set the owning side to null (unless already changed)
            if ($entretien->getCandidat() === $this) {
                $entretien->setCandidat(null);
            }
        }

        return $this;
    }

    
 
 
}
