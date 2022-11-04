<?php

namespace App\Repository;

use App\Entity\PhotoEpicerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhotoEpicerie>
 *
 * @method PhotoEpicerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoEpicerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoEpicerie[]    findAll()
 * @method PhotoEpicerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoEpicerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoEpicerie::class);
    }

    public function save(PhotoEpicerie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PhotoEpicerie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PhotoEpicerie[] Returns an array of PhotoEpicerie objects
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

//    public function findOneBySomeField($value): ?PhotoEpicerie
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
