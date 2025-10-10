<?php

namespace App\Repository;

use App\Entity\Venda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Venda>
 */
class VendaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Venda::class);
    }

    public function salvar(Venda $venda): void 
    {
        $this->getEntityManager()->persist($venda);
        $this->getEntityManager()->flush();
    }

    public function remover(Venda $venda): void
    {
        $this->getEntityManager()->remove($venda);
        $this->getEntityManager()->flush();
    }
}
