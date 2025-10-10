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
    private ?int $categoria_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $data_cadastro = null;

    #[ORM\Column]
    private ?int $quantidade_inicial = null;

    #[ORM\Column]
    private ?float $valor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

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
        return $this->categoria_id;
    }

    public function setCategoriaId(int $categoria_id): static
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    public function getDataCadastro(): ?\DateTime
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro(\DateTime $data_cadastro): static
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }

    public function getQuantidadeInicial(): ?int
    {
        return $this->quantidade_inicial;
    }

    public function setQuantidadeInicial(int $quantidade_inicial): static
    {
        $this->quantidade_inicial = $quantidade_inicial;

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
}
