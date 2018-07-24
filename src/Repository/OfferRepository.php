<?php

namespace App\Repository;

use App\Entity\Offer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
    public function findLastOffers(): array
    {
        $qb = $this->createQueryBuilder('o')
            ->orderBy('o.id', 'DESC')
            ->setMaxResults(4)
            ->getQuery();

        return $qb->execute();
    }

    public function findUserOffers($user): array
    {
        $qb = $this->createQueryBuilder('o')
            ->andWhere('o.creator = :user')
            ->setParameter('user', $user)
            ->orderBy('o.id', 'DESC')
            ->getQuery();

        return $qb->execute();
    }

    public function searchOffers($title): array
    {
        $qb = $this->createQueryBuilder('o')
            ->andWhere('o.title LIKE :title')
            ->setParameter('title', "%$title%")
            ->getQuery();

        return $qb->execute();
    }
}
