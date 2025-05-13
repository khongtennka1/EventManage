<?php

namespace App\Services;

use App\Services\Interfaces\UserManageServiceInterface;
use App\Repositories\Interfaces\UserManageRepositoryInterface;

class UserManageService implements UserManageServiceInterface
{
    protected $userManageRepo;

    public function __construct(UserManageRepositoryInterface $userManageRepo) {
        $this->userManageRepo = $userManageRepo;
    }

    public function getAllUser()
    {
        return $this->userManageRepo->getAllUser();
    }

    public function findUsers($keyword)
    {
        return $this->userManageRepo->findUsers($keyword);
    }

    public function delete($userID)
    {
        return $this->userManageRepo->delete($userID);
    }

    public function update($userID, $data)
    {
        return $this->userManageRepo->update($userID, $data);
    }

    public function create($data)
    {
        return $this->userManageRepo->create($data);
    }
}
?>