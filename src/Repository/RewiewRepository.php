<?php

namespace App\Repository;

use App\Entity\Rewiew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rewiew>
 *
 * @method Rewiew|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rewiew|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rewiew[]    findAll()
 * @method Rewiew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RewiewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rewiew::class);
    }

//    /**
//     * @return Rewiew[] Returns an array of Rewiew objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Rewiew
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
