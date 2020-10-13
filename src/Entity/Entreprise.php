<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EntrepriseRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ApiResource(
 *      normalizationContext={"groups" = {"read:solde"}}, 
 *      collectionOperations={"get"},
 *      itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:solde"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typecompte;

    /**
     * @ORM\OneToMany(targetEntity=Operations::class, mappedBy="numeroCompte", orphanRemoval=true)
     */
    private $numCompte;

    public function __construct()
    {
        $this->numCompte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNinea(): ?int
    {
        return $this->ninea;
    }

    public function setNinea(int $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getTypecompte(): ?string
    {
        return $this->typecompte;
    }

    public function setTypecompte(string $typecompte): self
    {
        $this->typecompte = $typecompte;

        return $this;
    }

    /**
     * @return Collection|Operations[]
     */
    public function getNumCompte(): Collection
    {
        return $this->numCompte;
    }

    public function addNumCompte(Operations $numCompte): self
    {
        if (!$this->numCompte->contains($numCompte)) {
            $this->numCompte[] = $numCompte;
            $numCompte->setNumeroCompte($this);
        }

        return $this;
    }

    public function removeNumCompte(Operations $numCompte): self
    {
        if ($this->numCompte->contains($numCompte)) {
            $this->numCompte->removeElement($numCompte);
            // set the owning side to null (unless already changed)
            if ($numCompte->getNumeroCompte() === $this) {
                $numCompte->setNumeroCompte(null);
            }
        }

        return $this;
    }
}
