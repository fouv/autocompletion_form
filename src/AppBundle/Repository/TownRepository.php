<?php

namespace AppBundle\Repository;

/**
 * TownRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TownRepository extends \Doctrine\ORM\EntityRepository
{
    public function getTownLike($country, $town)
    {
        $town = "%" . $town . "%";// recherche chaine caractère encadré %
        $qb = $this->createQueryBuilder('t')
            ->select('t.town')
            ->where('t.country = :country')
            ->andWhere('t.town LIKE :town')
            ->setParameter('country', $country)
            ->setParameter('town', $town)
            ->getQuery();
        return $qb->getResult();
    }
}
