<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $color = null;

    /**
     * @var Collection<int, Car>
     */
    #[ORM\OneToMany(targetEntity: Car::class, mappedBy: 'color')]
    private Collection $Car;

    public function __construct()
    {
        $this->Car = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection<int, Car>
     */
    public function getCar(): Collection
    {
        return $this->Car;
    }

    public function addCar(Car $car): static
    {
        if (!$this->Car->contains($car)) {
            $this->Car->add($car);
            $car->setColor($this);
        }

        return $this;
    }

    public function removeCar(Car $car): static
    {
        if ($this->Car->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getColor() === $this) {
                $car->setColor(null);
            }
        }

        return $this;
    }
}
