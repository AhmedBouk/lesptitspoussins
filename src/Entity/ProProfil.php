<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProProfilRepository")
 * @UniqueEntity(fields={"mail", "nom_entreprise"},
 *     errorPath="mail",
 *     message="Cette adresse mail existe déjà!",
 * )
 * @UniqueEntity(fields={"nom_entreprise"},
 *     errorPath="nom_entreprise",
 *     message="Ce nom d'entreprise existe déjà"
 * )
 */
class ProProfil implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $nom_entreprise;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
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
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombre_personnel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponibilite = 1;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=10, nullable=true)
     */
    private $tarif;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $horaire = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut = 1;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombredeplace;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ListeStatus", mappedBy="proProfil")
     */
    private $listestatus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paiement", mappedBy="proProfil")
     */
    private $paiement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="proProfil")
     */
    private $avis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Facturation", mappedBy="proProfil")
     */
    private $facturation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tuteur", mappedBy="proProfil")
     */
    private $tuteur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plan", mappedBy="proProfil")
     */
    private $plan;

    /**
     * @ORM\Column(type="array")
     */
    private $roles =[];

    public function __construct()
    {
        $this->created_at = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $this->listestatus = new ArrayCollection();
        $this->paiement = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->facturation = new ArrayCollection();
        $this->tuteur = new ArrayCollection();
        $this->plan = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getnomEntreprise(): ?string
    {
        return $this->nom_entreprise;
    }

    public function setnomEntreprise(string $nom_entreprise): self
    {
        $this->nom_entreprise = $nom_entreprise;

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

    public function setToken(?string $token): void
    {
        $this->token = $token;
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

    public function getNombrePersonnel(): ?int
    {
        return $this->nombre_personnel;
    }

    public function setNombrePersonnel(?int $nombre_personnel): self
    {
        $this->nombre_personnel = $nombre_personnel;

        return $this;
    }

    public function getDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getTarif()
    {
        return $this->tarif;
    }

    public function setTarif($tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getHoraire(): ?array
    {
        return $this->horaire;
    }

    public function setHoraire(?array $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNombredeplace(): ?int
    {
        return $this->nombredeplace;
    }

    public function setNombredeplace(int $nombredeplace): self
    {
        $this->nombredeplace = $nombredeplace;

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
            $listestatus->setProProfil($this);
        }

        return $this;
    }

    public function removeListestatus(ListeStatus $listestatus): self
    {
        if ($this->listestatus->contains($listestatus)) {
            $this->listestatus->removeElement($listestatus);
            // set the owning side to null (unless already changed)
            if ($listestatus->getProProfil() === $this) {
                $listestatus->setProProfil(null);
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
            $paiement->setProProfil($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiement->contains($paiement)) {
            $this->paiement->removeElement($paiement);
            // set the owning side to null (unless already changed)
            if ($paiement->getProProfil() === $this) {
                $paiement->setProProfil(null);
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
            $avi->setProProfil($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->contains($avi)) {
            $this->avis->removeElement($avi);
            // set the owning side to null (unless already changed)
            if ($avi->getProProfil() === $this) {
                $avi->setProProfil(null);
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
            $facturation->setProProfil($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): self
    {
        if ($this->facturation->contains($facturation)) {
            $this->facturation->removeElement($facturation);
            // set the owning side to null (unless already changed)
            if ($facturation->getProProfil() === $this) {
                $facturation->setProProfil(null);
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
            $tuteur->setProProfil($this);
        }

        return $this;
    }

    public function removeTuteur(Tuteur $tuteur): self
    {
        if ($this->tuteur->contains($tuteur)) {
            $this->tuteur->removeElement($tuteur);
            // set the owning side to null (unless already changed)
            if ($tuteur->getProProfil() === $this) {
                $tuteur->setProProfil(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Plan[]
     */
    public function getPlan(): Collection
    {
        return $this->plan;
    }

    public function addPlan(Plan $plan): self
    {
        if (!$this->plan->contains($plan)) {
            $this->plan[] = $plan;
            $plan->setProProfil($this);
        }

        return $this;
    }

    public function removePlan(Plan $plan): self
    {
        if ($this->plan->contains($plan)) {
            $this->plan->removeElement($plan);
            // set the owning side to null (unless already changed)
            if ($plan->getProProfil() === $this) {
                $plan->setProProfil(null);
            }
        }

        return $this;
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
        return $this->mail;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_PRO';

        return array_unique($roles);
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }
}
