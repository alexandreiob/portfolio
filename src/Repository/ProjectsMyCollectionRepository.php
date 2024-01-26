<?php

namespace App\Repository;

use App\Entity\ProjectsMyCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProjectsMyCollection>
 *
 * @method ProjectsMyCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectsMyCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectsMyCollection[]    findAll()
 * @method ProjectsMyCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsMyCollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectsMyCollection::class);
    }

//    /**
//     * @return ProjectsMyCollection[] Returns an array of ProjectsMyCollection objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProjectsMyCollection
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
