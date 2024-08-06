<?php

namespace App\Entity;

use App\Repository\CovoitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CovoitRepository::class)]
class Covoit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $DateStart = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $timeStart = null;

    #[ORM\Column(length: 50)]
    private ?string $placeStart = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateEnd = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $timeEnd = null;

    #[ORM\Column(length: 50)]
    private ?string $placeEnd = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    /**
     * @var Collection<int, Number>
     */
    #[ORM\ManyToMany(targetEntity: Number::class, inversedBy: 'covoits')]
    private Collection $NbPlace;

    #[ORM\Column]
    private ?float $pricePassenger = null;

    #[ORM\ManyToOne(inversedBy: 'covoits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $diverUser = null;

    public function __construct()
    {
        $this->NbPlace = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeImmutable
    {
        return $this->DateStart;
    }

    public function setDateStart(\DateTimeImmutable $DateStart): static
    {
        $this->DateStart = $DateStart;

        return $this;
    }

    public function getTimeStart(): ?\DateTimeImmutable
    {
        return $this->timeStart;
    }

    public function setTimeStart(\DateTimeImmutable $timeStart): static
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    public function getPlaceStart(): ?string
    {
        return $this->placeStart;
    }

    public function setPlaceStart(string $placeStart): static
    {
        $this->placeStart = $placeStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeImmutable
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeImmutable $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getTimeEnd(): ?\DateTimeImmutable
    {
        return $this->timeEnd;
    }

    public function setTimeEnd(\DateTimeImmutable $timeEnd): static
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    public function getPlaceEnd(): ?string
    {
        return $this->placeEnd;
    }

    public function setPlaceEnd(string $placeEnd): static
    {
        $this->placeEnd = $placeEnd;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Number>
     */
    public function getNbPlace(): Collection
    {
        return $this->NbPlace;
    }

    public function addNbPlace(Number $nbPlace): static
    {
        if (!$this->NbPlace->contains($nbPlace)) {
            $this->NbPlace->add($nbPlace);
        }

        return $this;
    }

    public function removeNbPlace(Number $nbPlace): static
    {
        $this->NbPlace->removeElement($nbPlace);

        return $this;
    }

    public function getPricePassenger(): ?float
    {
        return $this->pricePassenger;
    }

    public function setPricePassenger(float $pricePassenger): static
    {
        $this->pricePassenger = $pricePassenger;

        return $this;
    }

    public function getDiverUser(): ?User
    {
        return $this->diverUser;
    }

    public function setDiverUser(?User $diverUser): static
    {
        $this->diverUser = $diverUser;

        return $this;
    }
}
