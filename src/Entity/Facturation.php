<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturationRepository")
 */
class Facturation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $montant_ht;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=10, nullable=true)
     */
    private $tva;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=10, nullable=true)
     */
    private $total;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMontantHt()
    {
        return $this->montant_ht;
    }

    public function setMontantHt($montant_ht): self
    {
        $this->montant_ht = $montant_ht;

        return $this;
    }

    public function getTva()
    {
        return $this->tva;
    }

    public function setTva($tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }
}
