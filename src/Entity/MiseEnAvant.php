<?php

namespace App\Entity;

use App\Repository\MiseEnAvantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MiseEnAvantRepository::class)
 */
class MiseEnAvant
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=article::class, mappedBy="miseEnAvant")
     */
    private $article;

    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|article[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->setMiseEnAvant($this);
        }

        return $this;
    }

    public function removeArticle(article $article): self
    {
        if ($this->article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getMiseEnAvant() === $this) {
                $article->setMiseEnAvant(null);
            }
        }

        return $this;
    }
}
