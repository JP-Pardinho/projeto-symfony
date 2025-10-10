<?php

namespace App\Repository;

use App\Entity\VendaItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VendaItem>
 */
class VendaItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VendaItem::class);
    }

    public function salvar(VendaItem $vendaItem): void 
    {
        $this->getEntityManager()->persist($vendaItem);
        $this->getEntityManager()->flush();
    }

    public function remover(VendaItem $vendaItem): void
    {
        $this->getEntityManager()->remove($vendaItem);
        $this->getEntityManager()->flush();
    }
}
