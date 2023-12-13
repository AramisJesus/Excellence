<?php

namespace App\Repository;

use App\Entity\Ganho;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ganho>
 *
 * @method Ganho|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ganho|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ganho[]    findAll()
 * @method Ganho[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GanhoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ganho::class);
    }

//    /**
//     * @return Ganho[] Returns an array of Ganho objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ganho
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
