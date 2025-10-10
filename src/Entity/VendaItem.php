<?php

namespace App\Entity;

use App\Repository\VendaItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VendaItemRepository::class)]
class VendaItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $venda_id = null;

    #[ORM\Column]
    private ?int $produto_id = null;

    #[ORM\Column]
    private ?int $quantidade = null;

    #[ORM\Column]
    private ?float $preco_unitario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVendaId(): ?int
    {
        return $this->venda_id;
    }

    public function setVendaId(int $venda_id): static
    {
        $this->venda_id = $venda_id;

        return $this;
    }

    public function getProdutoId(): ?int
    {
        return $this->produto_id;
    }

    public function setProdutoId(int $produto_id): static
    {
        $this->produto_id = $produto_id;

        return $this;
    }

    public function getQuantidade(): ?int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): static
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getPrecoUnitario(): ?float
    {
        return $this->preco_unitario;
    }

    public function setPrecoUnitario(float $preco_unitario): static
    {
        $this->preco_unitario = $preco_unitario;

        return $this;
    }
}
