<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OperationsRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups" = {"read:solde"}},
 *      collectionOperations={"get"},
 *      itemOperations={"get"}
 * )
 * @ApiFilter(SearchFilter::class, properties={"numeroCompte": "exact"})
 * @ORM\Entity(repositoryClass=OperationsRepository::class)
 */
class Operations
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
     * @Groups({"read:solde"})
     */
    private $typeOperation;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Groups({"read:solde"})
     */
    private $montant;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Groups({"read:solde"})
     */
    private $solde;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOperation;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="numCompte")
     * @ORM\JoinColumn(nullable=false)
     */
    private $numeroCompte;

   

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

    public function getTypeOperation(): ?string
    {
        return $this->typeOperation;
    }

    public function setTypeOperation(string $typeOperation): self
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    public function getNumerocompte(): ?Entreprise
    {
        return $this->numeroCompte;
    }

    public function setNumerocompte(?Entreprise $numeroCompte): self
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }
}
