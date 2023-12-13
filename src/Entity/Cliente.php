<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?int $telefone = null;

    #[ORM\Column(nullable: true)]
    private ?int $cpf = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $endereco = null;


    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: Ganho::class)]
    private Collection $ganhos;

    public function __construct()
    {
       
        $this->ganhos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefone(): ?int
    {
        return $this->telefone;
    }

    public function setTelefone(?int $telefone): static
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getCpf(): ?int
    {
        return $this->cpf;
    }

    public function setCpf(?int $cpf): static
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): static
    {
        $this->endereco = $endereco;

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
            $ganho->setCliente($this);
        }

        return $this;
    }

    public function removeGanho(Ganho $ganho): static
    {
        if ($this->ganhos->removeElement($ganho)) {
            // set the owning side to null (unless already changed)
            if ($ganho->getCliente() === $this) {
                $ganho->setCliente(null);
            }
        }

        return $this;
    }
}
