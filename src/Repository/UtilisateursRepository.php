<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Utilisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Utilisateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateurs[]    findAll()
 * @method Utilisateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateurs::class);
    }

    /**
     * récupére les utilisateurs en lien avec une recherche
     * @return Utilisateurs[]
     */
    public function findSearch(SearchData $search): array
    {
        $query = $this
            ->createQueryBuilder('u')
            ->select('u','ca', 'ci')
            ->join('u.possede', 'ca')
            ->join('ca.cimetieres', 'ci');


        if(!empty($search->prenoms)){
            $query = $query
                ->andWhere('u.pre_ut LIKE :u')
                ->setParameter('u',"%{$search->prenoms}%");
        }
        if(!empty($search->nomFam)){
            $query = $query
                ->andWhere('u.nom_fam_ut LIKE :u')
                ->setParameter('u',"%{$search->nomFam}%");
        }
        if(!empty($search->nomUsa)){
            $query = $query
                ->andWhere('u.nom_us_ut LIKE :u')
                ->setParameter('u',"%{$search->nomUsa}%");
        }
        if(!empty($search->birth)){
            $query = $query
                ->andWhere('u.dayBirth_ut = :u')
                ->setParameter('u', $search->birth);
        }
        if(!empty($search->cimetieres)){
            $query=$query
                ->andWhere('ci.id IN (:cimetieres)')
                ->setParameter('cimetieres', $search->cimetieres);
        }




        return $query->getQuery()->getResult();
    }
}
