<?php

namespace App\Repository;

use App\Entity\Categoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categoria>
 */
class CategoriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categoria::class);
    }

    public function salvar(Categoria $categoria): void 
    {
        $this->getEntityManager()->persist($categoria);
        $this->getEntityManager()->flush();
    }

    public function remover(Categoria $categoria): void
    {
        $this->getEntityManager()->remove($categoria);
        $this->getEntityManager()->flush();
    }

    public function findNamebyId(int $id): ?string
    {
        $result = $this->query->select('categoria', 'id = ' . $id);

        if ($result && count($result) > 0) {
            $categoria = $result[0];
            return $categoria['nome'];
        }
        return null;
    }
}
