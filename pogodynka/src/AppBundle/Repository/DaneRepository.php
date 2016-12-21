<?php
// src/AppBundle/Repository/DataRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DaneRepository extends EntityRepository
{
    public function findExpensesForDate($cityName, $fromDate, $toDate)
    {
      return $this
        ->createQueryBuilder('e')
        ->where('e.postedAt >= :fromDate')
        ->andWhere('e.postedAt < :toDate')
        ->andWhere('e.city_name = :city')
        ->setParameter('fromDate', $fromDate)
        ->setParameter('toDate', $toDate)
        ->setParameter('city', $cityName)
         ->getQuery()->getResult();
    }
}