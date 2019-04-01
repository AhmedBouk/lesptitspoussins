<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParenttRepository")
 */
class Parentt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codepostal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $password;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $token;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at_abonnement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut_abonnement;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_duree;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_enabled;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ListeStatus", mappedBy="parentt")
     */
    private $listestatus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paiement", mappedBy="parentt")
     */
    private $paiement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="parentt")
     */
    private $avis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Facturation", mappedBy="parentt")
     */
    private $facturation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tuteur", mappedBy="parentt")
     */
    private $tuteur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EnfantProfil", mappedBy="parentt")
     */
    private $enfant;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $confirmpassword;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statutcondition;

    public function __construct()
    {
        $this->listestatus = new ArrayCollection();
        $this->paiement = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->facturation = new ArrayCollection();
        $this->tuteur = new ArrayCollection();
        $this->enfant = new ArrayCollection();
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

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(?int $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

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

    public function getCreatedAtAbonnement(): ?\DateTimeInterface
    {
        return $this->created_at_abonnement;
    }

    public function setCreatedAtAbonnement(?\DateTimeInterface $created_at_abonnement): self
    {
        $this->created_at_abonnement = $created_at_abonnement;

        return $this;
    }

    public function getStatutAbonnement(): ?bool
    {
        return $this->statut_abonnement;
    }

    public function setStatutAbonnement(bool $statut_abonnement): self
    {
        $this->statut_abonnement = $statut_abonnement;

        return $this;
    }

    public function getDateDuree(): ?\DateTimeInterface
    {
        return $this->date_duree;
    }

    public function setDateDuree(?\DateTimeInterface $date_duree): self
    {
        $this->date_duree = $date_duree;

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

    /**
     * @return Collection|ListeStatus[]
     */
    public function getListestatus(): Collection
    {
        return $this->listestatus;
    }

    public function addListestatus(ListeStatus $listestatus): self
    {
        if (!$this->listestatus->contains($listestatus)) {
            $this->listestatus[] = $listestatus;
            $listestatus->setParentt($this);
        }

        return $this;
    }

    public function removeListestatus(ListeStatus $listestatus): self
    {
        if ($this->listestatus->contains($listestatus)) {
            $this->listestatus->removeElement($listestatus);
            // set the owning side to null (unless already changed)
            if ($listestatus->getParentt() === $this) {
                $listestatus->setParentt(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Paiement[]
     */
    public function getPaiement(): Collection
    {
        return $this->paiement;
    }

    public function addPaiement(Paiement $paiement): self
    {
        if (!$this->paiement->contains($paiement)) {
            $this->paiement[] = $paiement;
            $paiement->setParentt($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiement->contains($paiement)) {
            $this->paiement->removeElement($paiement);
            // set the owning side to null (unless already changed)
            if ($paiement->getParentt() === $this) {
                $paiement->setParentt(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setParentt($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->contains($avi)) {
            $this->avis->removeElement($avi);
            // set the owning side to null (unless already changed)
            if ($avi->getParentt() === $this) {
                $avi->setParentt(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Facturation[]
     */
    public function getFacturation(): Collection
    {
        return $this->facturation;
    }

    public function addFacturation(Facturation $facturation): self
    {
        if (!$this->facturation->contains($facturation)) {
            $this->facturation[] = $facturation;
            $facturation->setParentt($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): self
    {
        if ($this->facturation->contains($facturation)) {
            $this->facturation->removeElement($facturation);
            // set the owning side to null (unless already changed)
            if ($facturation->getParentt() === $this) {
                $facturation->setParentt(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tuteur[]
     */
    public function getTuteur(): Collection
    {
        return $this->tuteur;
    }

    public function addTuteur(Tuteur $tuteur): self
    {
        if (!$this->tuteur->contains($tuteur)) {
            $this->tuteur[] = $tuteur;
            $tuteur->setParentt($this);
        }

        return $this;
    }

    public function removeTuteur(Tuteur $tuteur): self
    {
        if ($this->tuteur->contains($tuteur)) {
            $this->tuteur->removeElement($tuteur);
            // set the owning side to null (unless already changed)
            if ($tuteur->getParentt() === $this) {
                $tuteur->setParentt(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EnfantProfil[]
     */
    public function getEnfant(): Collection
    {
        return $this->enfant;
    }

    public function addEnfant(EnfantProfil $enfant): self
    {
        if (!$this->enfant->contains($enfant)) {
            $this->enfant[] = $enfant;
            $enfant->setParentt($this);
        }

        return $this;
    }

    public function removeEnfant(EnfantProfil $enfant): self
    {
        if ($this->enfant->contains($enfant)) {
            $this->enfant->removeElement($enfant);
            // set the owning side to null (unless already changed)
            if ($enfant->getParentt() === $this) {
                $enfant->setParentt(null);
            }
        }

        return $this;
    }

    public function getConfirmpassword(): ?string
    {
        return $this->confirmpassword;
    }

    public function setConfirmpassword(string $confirmpassword): self
    {
        $this->confirmpassword = $confirmpassword;

        return $this;
    }

    public function getStatutcondition(): ?bool
    {
        return $this->statutcondition;
    }

    public function setStatutcondition(bool $statutcondition): self
    {
        $this->statutcondition = $statutcondition;

        return $this;
    }
}
