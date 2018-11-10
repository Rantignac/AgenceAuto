<?php

namespace App\Repository;

use App\Entity\Offer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Offer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offer[]    findAll()
 * @method Offer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    /**
     * @return Offer[]
     */
    public function findAllVisible(): array
    {
        return $this->FindVisibleQuery()
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Offer[]
     */
    public function findLastest(): array
    {
        return $this->FindVisibleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();

    }

    private function FindVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->where('o.sold = false');
    }

}
