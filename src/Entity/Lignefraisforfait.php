<?php

namespace App\Entity;

use App\Repository\LignefraisforfaitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignefraisforfaitRepository::class)]
class Lignefraisforfait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Ficherais $idFiche = null;



    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'lignefraisforfaits')]
    private ?fraisforfait $idFraisForfait = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFiche(): ?Ficherais
    {
        return $this->idFiche;
    }

    public function setIdFiche(?Ficherais $idFiche): static
    {
        $this->idFiche = $idFiche;

        return $this;
    }



    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getIdFraisForfait(): ?fraisforfait
    {
        return $this->idFraisForfait;
    }

    public function setIdFraisForfait(?fraisforfait $idFraisForfait): static
    {
        $this->idFraisForfait = $idFraisForfait;

        return $this;
    }
}
