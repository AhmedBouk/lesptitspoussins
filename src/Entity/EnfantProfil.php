 <?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnfantProfilRepository")
 */
class EnfantProfil
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $allergie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $traitement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $maladies;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $autres;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parentt", inversedBy="enfant")
     */
    private $parentt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plan", mappedBy="enfantProfil")
     */
    private $plan;

    public function __construct()
    {
        $this->plan = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAllergie(): ?string
    {
        return $this->allergie;
    }

    public function setAllergie(?string $allergie): self
    {
        $this->allergie = $allergie;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(?string $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getMaladies(): ?string
    {
        return $this->maladies;
    }

    public function setMaladies(?string $maladies): self
    {
        $this->maladies = $maladies;

        return $this;
    }

    public function getAutres(): ?string
    {
        return $this->autres;
    }

    public function setAutres(?string $autres): self
    {
        $this->autres = $autres;

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
            $plan->setEnfantProfil($this);
        }

        return $this;
    }

    public function removePlan(Plan $plan): self
    {
        if ($this->plan->contains($plan)) {
            $this->plan->removeElement($plan);
            // set the owning side to null (unless already changed)
            if ($plan->getEnfantProfil() === $this) {
                $plan->setEnfantProfil(null);
            }
        }

        return $this;
    }
}
