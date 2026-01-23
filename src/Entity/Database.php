<?php

namespace App\Entity;

use App\Repository\DatabaseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatabaseRepository::class)]
class Database
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Content = null;

    #[ORM\Column]
    private ?int $DateCreated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(?string $Content): static
    {
        $this->Content = $Content;

        return $this;
    }

    public function getDateCreated(): ?int
    {
        return $this->DateCreated;
    }

    public function setDateCreated(int $DateCreated): static
    {
        $this->DateCreated = $DateCreated;

        return $this;
    }
}
