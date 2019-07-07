<?php

namespace App\Repository;

use App\Entity\MaterialAlgorithm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MaterialAlgorithm|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaterialAlgorithm|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaterialAlgorithm[]    findAll()
 * @method MaterialAlgorithm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterialAlgorithmRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MaterialAlgorithm::class);
    }

    // /**
    //  * @return MaterialAlgorithm[] Returns an array of MaterialAlgorithm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaterialAlgorithm
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
