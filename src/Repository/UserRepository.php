<?php


namespace App\Repository;


use App\CoreRepository;
use App\Entity\User;

class UserRepository extends CoreRepository
{
    public function get(int $id): ?User
    {
//        $cze = $this->entityManager->createQueryBuilder();
//        $cze->select('User.name')->from('User');
//        $this->entityManager->getConnection()->executeQuery()->fetchColumn();


    return $this->entityManager->getRepository('App:User')->find($id
    );
    }
}