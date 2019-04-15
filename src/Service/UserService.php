<?php


namespace App\Service;


use App\CoreRepository;
use App\Repository\UserRepository;

class UserService extends CoreRepository
{
    /** @var UserRepository */
    private $userRepo;

    /**
     * UserService constructor.
     * @param UserRepository $userRepo
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function getNameByUserId(int $id): string
    {
        $user = $this->userRepo->get($id);
        if ($user)
        {
            return $user->getName();
        }
        throw new \Exception("Nie znaleziono $id");
    }
}