<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatRepository::class)]
class Etat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'idEtat', targetEntity: Ficherais::class)]
    private Collection $ficherais;

    public function __construct()
    {
        $this->ficherais = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Ficherais>
     */
    public function getFicherais(): Collection
    {
        return $this->ficherais;
    }

    public function addFicherai(Ficherais $ficherai): static
    {
        if (!$this->ficherais->contains($ficherai)) {
            $this->ficherais->add($ficherai);
            $ficherai->setIdEtat($this);
        }

        return $this;
    }

    public function removeFicherai(Ficherais $ficherai): static
    {
        if ($this->ficherais->removeElement($ficherai)) {
            // set the owning side to null (unless already changed)
            if ($ficherai->getIdEtat() === $this) {
                $ficherai->setIdEtat(null);
            }
        }

        return $this;
    }
}
