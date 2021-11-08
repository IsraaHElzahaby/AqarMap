<?php

namespace App\Repository;

use App\Entity\AdminAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdminAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminAccount[]    findAll()
 * @method AdminAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminAccount::class);
    }

    


}
