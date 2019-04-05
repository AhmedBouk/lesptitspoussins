<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanRepository")
 */
class Plan
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heuredebut;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heuredefin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EnfantProfil", inversedBy="plan")
     */
    private $enfantProfil;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProProfil", inversedBy="plan")
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeuredebut(): ?\DateTimeInterface
    {
        return $this->heuredebut;
    }

    public function setHeuredebut(?\DateTimeInterface $heuredebut): self
    {
        $this->heuredebut = $heuredebut;

        return $this;
    }

    public function getHeuredefin(): ?\DateTimeInterface
    {
        return $this->heuredefin;
    }

    public function setHeuredefin(?\DateTimeInterface $heuredefin): self
    {
        $this->heuredefin = $heuredefin;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
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

    public function getEnfantProfil(): ?EnfantProfil
    {
        return $this->enfantProfil;
    }

    public function setEnfantProfil(?EnfantProfil $enfantProfil): self
    {
        $this->enfantProfil = $enfantProfil;

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
