<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriaRepository::class)]
class Categoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 300)]
    private ?string $tipo = null;

  

    #[ORM\OneToMany(mappedBy: 'categoria', targetEntity: Despesa::class)]
    private Collection $despesas;

    #[ORM\OneToMany(mappedBy: 'categoria', targetEntity: Ganho::class)]
    private Collection $ganhos;

    public function __construct()
    {
        
        $this->despesas = new ArrayCollection();
        $this->ganhos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }


    /**
     * @return Collection<int, Despesa>
     */
    public function getDespesas(): Collection
    {
        return $this->despesas;
    }

    public function addDespesa(Despesa $despesa): static
    {
        if (!$this->despesas->contains($despesa)) {
            $this->despesas->add($despesa);
            $despesa->setCategoria($this);
        }

        return $this;
    }

    public function removeDespesa(Despesa $despesa): static
    {
        if ($this->despesas->removeElement($despesa)) {
            // set the owning side to null (unless already changed)
            if ($despesa->getCategoria() === $this) {
                $despesa->setCategoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ganho>
     */
    public function getGanhos(): Collection
    {
        return $this->ganhos;
    }

    public function addGanho(Ganho $ganho): static
    {
        if (!$this->ganhos->contains($ganho)) {
            $this->ganhos->add($ganho);
            $ganho->setCategoria($this);
        }

        return $this;
    }

    public function removeGanho(Ganho $ganho): static
    {
        if ($this->ganhos->removeElement($ganho)) {
            // set the owning side to null (unless already changed)
            if ($ganho->getCategoria() === $this) {
                $ganho->setCategoria(null);
            }
        }

        return $this;
    }
}
