<?php

namespace App\Entity;

use App\Repository\DespesaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DespesaRepository::class)]
class Despesa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column]
    private ?float $valor = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $emissao = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $vencimento = null;

    #[ORM\Column(nullable: true)]
    private ?bool $pago = null;

    #[ORM\ManyToOne(inversedBy: 'despesas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fornecedor $fornecedor = null;

    #[ORM\ManyToOne(inversedBy: 'despesas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categoria $categoria = null;

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

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): static
    {
        $this->valor = $valor;

        return $this;
    }

    public function getEmissao(): ?\DateTimeInterface
    {
        return $this->emissao;
    }

    public function setEmissao(\DateTimeInterface $emissao): static
    {
        $this->emissao = $emissao;

        return $this;
    }

    public function getVencimento(): ?\DateTimeInterface
    {
        return $this->vencimento;
    }

    public function setVencimento(\DateTimeInterface $vencimento): static
    {
        $this->vencimento = $vencimento;

        return $this;
    }

    public function isPago(): ?bool
    {
        return $this->pago;
    }

    public function setPago(?bool $pago): static
    {
        $this->pago = $pago;

        return $this;
    }

    public function getFornecedor(): ?Fornecedor
    {
        return $this->fornecedor;
    }

    public function setFornecedor(?Fornecedor $fornecedor): static
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): static
    {
        $this->categoria = $categoria;

        return $this;
    }
}
