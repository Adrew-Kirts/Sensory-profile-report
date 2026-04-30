<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Patient>
 *
 * @method Patient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patient[]    findAll()
 * @method Patient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patient::class);
    }

    public function findByKeyword(string $keyword): array
    {
        return $this->createQueryBuilder('r')
            ->where('r.first_name LIKE :keyword')
            ->orWhere('r.last_name LIKE :keyword')
            ->orderBy('r.updated_at', 'ASC')
            ->setParameter('keyword', '%'.$keyword.'%')
            ->getQuery()
            ->getResult();
    }

    public function findByKeywordForUser(string $keyword, $user): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.user = :user')
            ->andWhere('r.first_name LIKE :keyword OR r.last_name LIKE :keyword')
            ->orderBy('r.updated_at', 'ASC')
            ->setParameter('keyword', '%'.$keyword.'%')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function findWithoutSurveyForUser($user, int $limit = 5): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.surveys', 's')
            ->andWhere('p.user = :user')
            ->andWhere('s.id IS NULL')
            ->orderBy('p.created_at', 'ASC')
            ->setParameter('user', $user)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Patient[] Returns an array of Patient objects
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

    //    public function findOneBySomeField($value): ?Patient
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
