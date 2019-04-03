<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaiementRepository")
 */
class Paiement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=10, nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $mode_paiement = [];

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_paiement;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parentt", inversedBy="paiement")
     */
    private $parentt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProProfil", inversedBy="paiement")
     */
    private $proProfil;

    public function __construct()
    {
        $this->created_at = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getModePaiement(): ?array
    {
        return $this->mode_paiement;
    }

    public function setModePaiement(?array $mode_paiement): self
    {
        $this->mode_paiement = $mode_paiement;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->date_paiement;
    }

    public function setDatePaiement(?\DateTimeInterface $date_paiement): self
    {
        $this->date_paiement = $date_paiement;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getParentt(): ?Parentt
    {
        return $this->parentt;
    }

    public function setParentt(?Parentt $parentt): self
    {
        $this->parentt = $parentt;

        return $this;
    }

    public function getProProfil(): ?ProProfil
    {
        return $this->proProfil;
    }

    public function setProProfil(?ProProfil $proProfil): self
    {
        $this->proProfil = $proProfil;

        return $this;
    }
}
