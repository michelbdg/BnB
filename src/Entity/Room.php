<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[Assert\NotBlank(
    message: 'You should enter a title.'
)]

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'The address must be at least {{ limit }} characters long',
        maxMessage: 'The address cannot be longer than {{ limit }} characters',
    )]


    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'The city must be at least {{ limit }} characters long',
        maxMessage: 'The city cannot be longer than {{ limit }} characters',
    )]

    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'The country must be at least {{ limit }} characters long',
        maxMessage: 'The country cannot be longer than {{ limit }} characters',
    )]

    #[Assert\Positive(
        message: 'The price cannot be negative or free.'
    )]
    #[Assert\NotBlank(
        message: 'You should enter a price.'
    )]


    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $country = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cover = '/images/room-cover.jpg';

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $host = null;

    #[ORM\OneToMany(mappedBy: 'rooms', targetEntity: Rewiew::class, orphanRemoval: true)]
    private Collection $rewiews;

    #[ORM\OneToMany(mappedBy: 'room', targetEntity: Booking::class)]
    private Collection $bookings;

    #[ORM\OneToMany(mappedBy: 'rooms', targetEntity: Equipment::class)]
    private Collection $equipments;

    #[ORM\ManyToMany(targetEntity: Favorite::class, mappedBy: 'rooms')]
    private Collection $favorites;

    public function __construct()
    {
        $this->rewiews = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->equipments = new ArrayCollection();
        $this->favorites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): static
    {
        $this->cover = $cover;

        return $this;
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

    public function getHost(): ?User
    {
        return $this->host;
    }

    public function setHost(?User $host): static
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return Collection<int, Rewiew>
     */
    public function getRewiews(): Collection
    {
        return $this->rewiews;
    }

    public function addRewiew(Rewiew $rewiew): static
    {
        if (!$this->rewiews->contains($rewiew)) {
            $this->rewiews->add($rewiew);
            $rewiew->setRooms($this);
        }

        return $this;
    }

    public function removeRewiew(Rewiew $rewiew): static
    {
        if ($this->rewiews->removeElement($rewiew)) {
            // set the owning side to null (unless already changed)
            if ($rewiew->getRooms() === $this) {
                $rewiew->setRooms(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): static
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings->add($booking);
            $booking->setRoom($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): static
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getRoom() === $this) {
                $booking->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipment>
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
    }

    public function addEquipment(Equipment $equipment): static
    {
        if (!$this->equipments->contains($equipment)) {
            $this->equipments->add($equipment);
            $equipment->setRooms($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): static
    {
        if ($this->equipments->removeElement($equipment)) {
            // set the owning side to null (unless already changed)
            if ($equipment->getRooms() === $this) {
                $equipment->setRooms(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Favorite>
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorite $favorite): static
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites->add($favorite);
            $favorite->addRoom($this);
        }

        return $this;
    }

    public function removeFavorite(Favorite $favorite): static
    {
        if ($this->favorites->removeElement($favorite)) {
            $favorite->removeRoom($this);
        }

        return $this;
    }
}
