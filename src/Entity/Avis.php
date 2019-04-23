<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $note = [];

    /**
     * @ORM\Column(type="text")
     * @Assert\Range(min=10,max=450)
     *
     */
    private $texte;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_enabled = 1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parentt", inversedBy="avis")
     */
    private $parentt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProProfil", inversedBy="avis")
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

    public function getNote(): ?array
    {
        return $this->note;
    }

    public function setNote(array $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

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

    public function getIsEnabled(): ?bool
    {
        return $this->is_enabled;
    }

    public function setIsEnabled(bool $is_enabled): self
    {
        $this->is_enabled = $is_enabled;

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
