<?php

namespace App\Entity;

use App\Repository\FraisforfaitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FraisforfaitRepository::class)]
class Fraisforfait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $montant = null;

    #[ORM\OneToMany(mappedBy: 'idFraisForfait', targetEntity: Lignefraisforfait::class)]
    private Collection $lignefraisforfaits;

    public function __construct()
    {
        $this->lignefraisforfaits = new ArrayCollection();
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

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * @return Collection<int, Lignefraisforfait>
     */
    public function getLignefraisforfaits(): Collection
    {
        return $this->lignefraisforfaits;
    }

    public function addLignefraisforfait(Lignefraisforfait $lignefraisforfait): static
    {
        if (!$this->lignefraisforfaits->contains($lignefraisforfait)) {
            $this->lignefraisforfaits->add($lignefraisforfait);
            $lignefraisforfait->setIdFraisForfait($this);
        }

        return $this;
    }

    public function removeLignefraisforfait(Lignefraisforfait $lignefraisforfait): static
    {
        if ($this->lignefraisforfaits->removeElement($lignefraisforfait)) {
            // set the owning side to null (unless already changed)
            if ($lignefraisforfait->getIdFraisForfait() === $this) {
                $lignefraisforfait->setIdFraisForfait(null);
            }
        }

        return $this;
    }
}
