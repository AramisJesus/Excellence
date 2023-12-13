<?php

namespace App\Entity;

use App\Repository\FornecedorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FornecedorRepository::class)]
class Fornecedor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 300, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?int $telefone = null;

    #[ORM\Column(nullable: true)]
    private ?int $cnpj = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $endereco = null;

    #[ORM\OneToMany(mappedBy: 'fornecedor', targetEntity: Despesa::class)]
    private Collection $despesas;

    public function __construct()
    {
        $this->despesas = new ArrayCollection();
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

    public function getCnpj(): ?int
    {
        return $this->cnpj;
    }

    public function setCnpj(?int $cnpj): static
    {
        $this->cnpj = $cnpj;

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
            $despesa->setFornecedor($this);
        }

        return $this;
    }

    public function removeDespesa(Despesa $despesa): static
    {
        if ($this->despesas->removeElement($despesa)) {
            // set the owning side to null (unless already changed)
            if ($despesa->getFornecedor() === $this) {
                $despesa->setFornecedor(null);
            }
        }

        return $this;
    }
}
