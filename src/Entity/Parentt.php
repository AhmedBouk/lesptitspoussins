<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParenttRepository")
 * @UniqueEntity(fields={"mail"},
 *     errorPath="mail",
 *     message="Cette adresse mail existe déjà!"
 * )
 */
class Parentt implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     *
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\Email(
     *     checkMX = true
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Regex("/^[0-9]{5}$/")
     */
    private $codepostal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=150)
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
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\File(mimeTypes={"image/jpeg"})
     */
    private $revenu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\File(mimeTypes={"image/jpeg"})
     */
    private $attestationcaf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\File(mimeTypes={"image/jpeg"})
     */
    private $justificatifdomicile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\File(mimeTypes={"image/jpeg"})
     */
    private $impots;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\File(mimeTypes={"image/jpeg"})
     */
    private $livretdefamille;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at_abonnement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut_abonnement = 0;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_duree;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_enabled = 1;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

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
     * @ORM\Column(type="boolean")
     */
    private $statutcondition = 1;


    public function __construct()
    {
        $this->created_at = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
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

    public function getMail(): ?string// you *may* need a real salt depending on your encoder
        // see section on salt below
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
    {// you *may* need a real salt depending on your encoder
        // see section on salt below
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

        return $this;// you *may* need a real salt depending on your encoder
        // see section on salt below
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
    {// you *may* need a real salt depending on your encoder
        // see section on salt below
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
            };
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

    public function getStatutcondition(): ?bool
    {
        return $this->statutcondition;
    }

    public function setStatutcondition(bool $statutcondition): self
    {
        $this->statutcondition = $statutcondition;

        return $this;
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
        return $this->mail;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_PARENT';

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

    /**
     * @return mixed
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * @param mixed $passwordRequestedAt
     */
    public function setPasswordRequestedAt($passwordRequestedAt): void
    {
        $this->passwordRequestedAt = $passwordRequestedAt;
    }

    public function getRevenu()
    {
        return $this->revenu;
    }

    public function setRevenu(?string $revenu)
    {
        $this->revenu = $revenu;

        return $this;
    }

    public function getAttestationcaf(): ?string
    {
        return $this->attestationcaf;
    }

    public function setAttestationcaf(?string $attestationcaf): self
    {
        $this->attestationcaf = $attestationcaf;

        return $this;
    }

    public function getJustificatifdomicile(): ?string
    {
        return $this->justificatifdomicile;
    }

    public function setJustificatifdomicile(?string $justificatifdomicile): self
    {
        $this->justificatifdomicile = $justificatifdomicile;

        return $this;
    }

    public function getImpots(): ?string
    {
        return $this->impots;
    }

    public function setImpots(?string $impots): self
    {
        $this->impots = $impots;

        return $this;
    }

    public function getLivretdefamille(): ?string
    {
        return $this->livretdefamille;
    }

    public function setLivretdefamille(?string $livretdefamille): self
    {
        $this->livretdefamille = $livretdefamille;

        return $this;
    }
}
