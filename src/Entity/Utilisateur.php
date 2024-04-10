<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 6)]
    private ?string $cp = null;

    #[ORM\Column(length: 40)]
    private ?string $ville = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEmbauche = null;

    #[ORM\OneToMany(mappedBy: 'idUtilisateur', targetEntity: Ficherais::class)]
    private Collection $ficherais;

    public function __construct()
    {
        $this->ficherais = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->dateEmbauche;
    }

    public function setDateEmbauche(\DateTimeInterface $dateEmbauche): static
    {
        $this->dateEmbauche = $dateEmbauche;

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
            $ficherai->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeFicherai(Ficherais $ficherai): static
    {
        if ($this->ficherais->removeElement($ficherai)) {
            // set the owning side to null (unless already changed)
            if ($ficherai->getIdUtilisateur() === $this) {
                $ficherai->setIdUtilisateur(null);
            }
        }

        return $this;
    }
}
