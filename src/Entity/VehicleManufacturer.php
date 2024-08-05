<?php

namespace App\Entity;

use App\Repository\VehicleManufacturerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleManufacturerRepository::class)]
class VehicleManufacturer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $constructor = null;

    /**
     * @var Collection<int, Car>
     */
    #[ORM\OneToMany(targetEntity: Car::class, mappedBy: 'vehicleManufacturer')]
    private Collection $car;

    public function __construct()
    {
        $this->car = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConstructor(): ?string
    {
        return $this->constructor;
    }

    public function setConstructor(string $constructor): static
    {
        $this->constructor = $constructor;

        return $this;
    }

    /**
     * @return Collection<int, Car>
     */
    public function getCar(): Collection
    {
        return $this->car;
    }

    public function addCar(Car $car): static
    {
        if (!$this->car->contains($car)) {
            $this->car->add($car);
            $car->setVehicleManufacturer($this);
        }

        return $this;
    }

    public function removeCar(Car $car): static
    {
        if ($this->car->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getVehicleManufacturer() === $this) {
                $car->setVehicleManufacturer(null);
            }
        }

        return $this;
    }
}
