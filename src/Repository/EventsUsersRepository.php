<?php

namespace App\Repository;

use App\Entity\EventsUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsUsers[]    findAll()
 * @method EventsUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsUsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsUsers::class);
    }

    // /**
    //  * @return EventsUsers[] Returns an array of EventsUsers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EventsUsersEntity
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
