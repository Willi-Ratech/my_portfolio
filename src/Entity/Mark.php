<?php

namespace App\Entity;

use App\Repository\MarkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarkRepository::class)]
class Mark
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Equipment>
     */
    #[ORM\OneToMany(targetEntity: Equipment::class, mappedBy: 'mark')]
    private Collection $Equipment;

    public function __construct()
    {
        $this->Equipment = new ArrayCollection();
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
            $equipment->setMark($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): static
    {
        if ($this->Equipment->removeElement($equipment)) {
            // set the owning side to null (unless already changed)
            if ($equipment->getMark() === $this) {
                $equipment->setMark(null);
            }
        }

        return $this;
    }
}
