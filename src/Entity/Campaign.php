<?php

namespace App\Entity;

use App\Repository\CampaignRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampaignRepository::class)
 */
class Campaign
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $version;

    /**
     * @ORM\OneToMany(targetEntity=MbEntity::class, mappedBy="campaign", orphanRemoval=true)
     */
    private $mbEntities;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $encodage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    public function __construct()
    {
        $this->mbEntities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return Collection|MbEntity[]
     */
    public function getMbEntities(): Collection
    {
        return $this->mbEntities;
    }

    public function addMbEntity(MbEntity $mbEntity): self
    {
        if (!$this->mbEntities->contains($mbEntity)) {
            $this->mbEntities[] = $mbEntity;
            $mbEntity->setCampaign($this);
        }

        return $this;
    }

    public function removeMbEntity(MbEntity $mbEntity): self
    {
        if ($this->mbEntities->removeElement($mbEntity)) {
            // set the owning side to null (unless already changed)
            if ($mbEntity->getCampaign() === $this) {
                $mbEntity->setCampaign(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEncodage(): ?string
    {
        return $this->encodage;
    }

    public function setEncodage(string $encodage): self
    {
        $this->encodage = $encodage;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
