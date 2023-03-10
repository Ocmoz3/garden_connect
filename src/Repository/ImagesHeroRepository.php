<?php

namespace App\Repository;

use App\Entity\ImagesHero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImagesHero>
 *
 * @method ImagesHero|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesHero|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesHero[]    findAll()
 * @method ImagesHero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesHeroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesHero::class);
    }

    public function add(ImagesHero $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ImagesHero $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function superiorPositionImagesHero($position){
        return $this->createQueryBuilder('i')
            ->andWhere('i.position >= :val')
            ->setParameter('val', $position)
            ->getQuery()
            ->getResult();
    }

    public function inferiorPositionImagesHero($position){
        return $this->createQueryBuilder('i')
            ->andWhere('i.position <= :val')
            ->setParameter('val', $position)
            ->getQuery()
            ->getResult();
    }

    public function isPositionEgalToZero(){
        return $this->createQueryBuilder('i')
            ->andWhere('i.position = :val')
            ->setParameter('val', 0)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function lastPositionImagesHero(){
        return $this->createQueryBuilder('i')
            ->select('i , MAX(i.position)')
            ->getQuery()
            ->getResult();
    }
}
