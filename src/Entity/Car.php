<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $model = null;

    #[ORM\Column(length: 50)]
    private ?string $licencePlate = null;
    
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $commercialDate = null;

    #[ORM\Column]
    private ?bool $energy = null;

    #[ORM\ManyToOne(inversedBy: 'Car')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $color = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getLicencePlate(): ?string
    {
        return $this->licencePlate;
    }

    public function setLicencePlate(string $licencePlate): static
    {
        $this->licencePlate = $licencePlate;

        return $this;
    }

    public function getCommercialDate(): ?\DateTimeImmutable
    {
        return $this->commercialDate;
    }

    public function setCommercialDate(\DateTimeImmutable $commercialDate): static
    {
        $this->commercialDate = $commercialDate;

        return $this;
    }

    public function isEnergy(): ?bool
    {
        return $this->energy;
    }

    public function setEnergy(bool $energy): static
    {
        $this->energy = $energy;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): static
    {
        $this->color = $color;

        return $this;
    }
}