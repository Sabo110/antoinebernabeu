<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $auteur = null;

    #[ORM\Column(length: 255)]
    private ?string $eamil = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datecommentaire = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?Peinture $peinture = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?Blogpost $blogpost = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getEamil(): ?string
    {
        return $this->eamil;
    }

    public function setEamil(string $eamil): self
    {
        $this->eamil = $eamil;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDatecommentaire(): ?\DateTimeInterface
    {
        return $this->datecommentaire;
    }

    public function setDatecommentaire(\DateTimeInterface $datecommentaire): self
    {
        $this->datecommentaire = $datecommentaire;

        return $this;
    }

    public function getPeinture(): ?Peinture
    {
        return $this->peinture;
    }

    public function setPeinture(?Peinture $peinture): self
    {
        $this->peinture = $peinture;

        return $this;
    }

    public function getBlogpost(): ?Blogpost
    {
        return $this->blogpost;
    }

    public function setBlogpost(?Blogpost $blogpost): self
    {
        $this->blogpost = $blogpost;

        return $this;
    }
}
