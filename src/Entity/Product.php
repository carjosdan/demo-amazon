<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $asin = null;

    #[ORM\Column(length: 500)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(length: 10)]
    private ?string $currency = null;

    #[ORM\Column(length: 5)]
    private ?string $priceSymbol = null;

    #[ORM\Column(length: 500)]
    private ?string $image = null;

    #[ORM\Column(length: 500)]
    private ?string $url = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    private ?string $category = null;

    #[ORM\Column(length: 100)]
    private ?string $availability = null;

    #[ORM\Column(length: 100)]
    private ?string $brand = null;

    #[ORM\Column(type: Types::JSON)]
    private array $features = [];

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 1)]
    private ?string $ratingScore = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 1)]
    private ?string $ratingStars = null;

    #[ORM\Column(length: 50)]
    private ?string $ratingText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAsin(): ?string
    {
        return $this->asin;
    }

    public function setAsin(string $asin): static
    {
        $this->asin = $asin;
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): static
    {
        $this->currency = $currency;
        return $this;
    }

    public function getPriceSymbol(): ?string
    {
        return $this->priceSymbol;
    }

    public function setPriceSymbol(string $priceSymbol): static
    {
        $this->priceSymbol = $priceSymbol;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;
        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(string $availability): static
    {
        $this->availability = $availability;
        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;
        return $this;
    }

    public function getFeatures(): array
    {
        return $this->features;
    }

    public function setFeatures(array $features): static
    {
        $this->features = $features;
        return $this;
    }

    public function getRatingScore(): ?string
    {
        return $this->ratingScore;
    }

    public function setRatingScore(string $ratingScore): static
    {
        $this->ratingScore = $ratingScore;
        return $this;
    }

    public function getRatingStars(): ?string
    {
        return $this->ratingStars;
    }

    public function setRatingStars(string $ratingStars): static
    {
        $this->ratingStars = $ratingStars;
        return $this;
    }

    public function getRatingText(): ?string
    {
        return $this->ratingText;
    }

    public function setRatingText(string $ratingText): static
    {
        $this->ratingText = $ratingText;
        return $this;
    }
}
