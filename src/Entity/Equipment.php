<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $stock = null;

    #[ORM\Column(length: 255)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTime $launch_date = null;

    #[ORM\Column(length: 255)]
    private ?string $compatibility = null;

    #[ORM\Column(length: 255)]
    private ?string $waranty = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?float $dimension = null;

    #[ORM\Column(length: 255)]
    private ?string $opinion = null;

    #[ORM\Column(length: 255)]
    private ?string $tec_spec = null;

    #[ORM\ManyToOne(inversedBy: 'Equipment')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'Equipment')]
    private ?Mark $mark = null;

    #[ORM\ManyToOne(inversedBy: 'Equipment')]
    private ?Model $model = null;

    #[ORM\ManyToOne(inversedBy: 'equipment')]
    private ?Category $Category = null;

    #[ORM\Column(length: 255)]
    private ?string $image1 = null;

    #[ORM\Column(length: 255)]
    private ?string $image2 = null;

    #[ORM\Column(length: 255)]
    private ?string $image3 = null;

    #[ORM\Column(length: 255)]
    private ?string $image4 = null;

    public function __construct()
    {
       
    }

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

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): static
    {
        $this->stock = $stock;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLaunchDate(): ?\DateTime
    {
        return $this->launch_date;
    }

    public function setLaunchDate(\DateTime $launch_date): static
    {
        $this->launch_date = $launch_date;

        return $this;
    }

    public function getCompatibility(): ?string
    {
        return $this->compatibility;
    }

    public function setCompatibility(string $compatibility): static
    {
        $this->compatibility = $compatibility;

        return $this;
    }

    public function getWaranty(): ?string
    {
        return $this->waranty;
    }

    public function setWaranty(string $waranty): static
    {
        $this->waranty = $waranty;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): static
    {
        $this->weight = $weight;

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

    public function getDimension(): ?float
    {
        return $this->dimension;
    }

    public function setDimension(float $dimension): static
    {
        $this->dimension = $dimension;

        return $this;
    }

    public function getOpinion(): ?string
    {
        return $this->opinion;
    }

    public function setOpinion(string $opinion): static
    {
        $this->opinion = $opinion;

        return $this;
    }

    public function getTecSpec(): ?string
    {
        return $this->tec_spec;
    }

    public function setTecSpec(string $tec_spec): static
    {
        $this->tec_spec = $tec_spec;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getMark(): ?Mark
    {
        return $this->mark;
    }

    public function setMark(?Mark $mark): static
    {
        $this->mark = $mark;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(string $image1): static
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(string $image2): static
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(string $image4): static
    {
        $this->image4 = $image4;

        return $this;
    }

}
