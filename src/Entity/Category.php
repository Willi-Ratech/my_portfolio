<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    /**
     * @var Collection<int, Equipment>
     */
    #[ORM\OneToMany(targetEntity: Equipment::class, mappedBy: 'category')]
    private Collection $Equipment;

    /**
     * @var Collection<int, Equipment>
     */
    #[ORM\OneToMany(targetEntity: Equipment::class, mappedBy: 'Category')]
    private Collection $equipment;

    public function __construct()
    {
        $this->Equipment = new ArrayCollection();
        $this->equipment = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, Equipment>
     */
    public function getEquipment(): Collection
    {
        return $this->Equipment;
    }

    public function addEquipment(Equipment $equipment): static
    {
        if (!$this->Equipment->contains($equipment)) {
            $this->Equipment->add($equipment);
            $equipment->setCategory($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): static
    {
        if ($this->Equipment->removeElement($equipment)) {
            // set the owning side to null (unless already changed)
            if ($equipment->getCategory() === $this) {
                $equipment->setCategory(null);
            }
        }

        return $this;
    }

}
