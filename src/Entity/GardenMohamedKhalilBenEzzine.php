<?php

namespace App\Entity;

use App\Repository\GardenMohamedKhalilBenEzzineRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GardenMohamedKhalilBenEzzineRepository::class)]
class GardenMohamedKhalilBenEzzine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column]
    private ?bool $Status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $VisitDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->Status;
    }

    public function setStatus(bool $Status): static
    {
        $this->Status = $Status;

        return $this;
    }

    public function getVisitDate(): ?\DateTime
    {
        return $this->VisitDate;
    }

    public function setVisitDate(\DateTime $VisitDate): static
    {
        $this->VisitDate = $VisitDate;

        return $this;
    }
}
