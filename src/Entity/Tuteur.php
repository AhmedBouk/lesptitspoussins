<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TuteurRepository")
 */
class Tuteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Range(min=5,max=150)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Range(min=5,max=150)
     */
    private $prenom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parentt", inversedBy="tuteur")
     */
    private $parentt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProProfil", inversedBy="tuteur")
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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
