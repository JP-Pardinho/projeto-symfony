<?php

namespace App\Entity;

use App\Repository\ProdutoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdutoRepository::class)]
class Produto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nome = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column]
    private ?int $categoriaId = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dataCadastro = null;

    #[ORM\Column]
    private ?int $quantidadeInicial = null;

    #[ORM\Column]
    private ?float $valor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column]
    private ?int $quantidadeDisponivel = null;

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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): static
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getCategoriaId(): ?int
    {
        return $this->categoriaId;
    }

    public function setCategoriaId(int $categoriaId): static
    {
        $this->categoriaId = $categoriaId;

        return $this;
    }

    public function getDataCadastro(): ?\DateTime
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro(\DateTime $dataCadastro): static
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    public function getQuantidadeInicial(): ?int
    {
        return $this->quantidadeInicial;
    }

    public function setQuantidadeInicial(int $quantidadeInicial): static
    {
        $this->quantidadeInicial = $quantidadeInicial;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getQuantidadeDisponivel(): ?int
    {
        return $this->quantidadeDisponivel;
    }

    public function setQuantidadeDisponivel(int $quantidadeDisponivel): static
    {
        $this->quantidadeDisponivel = $quantidadeDisponivel;

        return $this;
    }
}
