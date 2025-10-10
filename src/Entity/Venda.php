<?php

namespace App\Entity;

use App\Repository\VendaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VendaRepository::class)]
class Venda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $data_venda = null;

    #[ORM\Column(length: 11)]
    private ?string $cpf_cliente = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataVenda(): ?\DateTime
    {
        return $this->data_venda;
    }

    public function setDataVenda(\DateTime $data_venda): static
    {
        $this->data_venda = $data_venda;

        return $this;
    }

    public function getCpfCliente(): ?string
    {
        return $this->cpf_cliente;
    }

    public function setCpfCliente(string $cpf_cliente): static
    {
        $this->cpf_cliente = $cpf_cliente;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
