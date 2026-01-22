<?php

namespace App\Entity;

use AllowDynamicProperties;
use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[AllowDynamicProperties]
#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank(message: "Tytuł nie może być pusty.")]
    #[Assert\Length(
        min: 5,
        max: 80,
        minMessage: "Tytuł musi mieć co najmniej {{ limit }} znaków."
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deleted_at = null;

    #[ORM\Column(length: 255)]
    private ?string $tags = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\NotBlank(message: "Treść artykułu jest wymagana.")]
    private ?string $article_body = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateAdded = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function gettitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getcreated_at(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setcreated_at(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getdeleted_at(): ?\DateTimeImmutable
    {
        return $this->deleted_at;
    }

    public function setdeleted_at(?\DateTimeImmutable $deleted_at): static
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function gettags(): ?string
    {
        return $this->tags;
    }

    public function settags(string $tags): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getarticlebody(): ?string
    {
        return $this->article_body;
    }

    public function setarticle_body(?string $article_body): static
    {
        $this->article_body = $article_body;

        return $this;
    }

    public function getDateAdded(): ?\DateTime
    {
        return $this->dateAdded;
    }

    public function setDateAdded(\DateTime $dateAdded): static
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): static
    {
        $this->author = $author;

        return $this;
    }
}
