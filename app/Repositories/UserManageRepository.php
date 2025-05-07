<?php

namespace App\Repositories;

use App\Models\Account;
use App\Repositories\Interfaces\UserManageRepositoryInterface;

class UserManageRepository implements UserManageRepositoryInterface
{
    protected $model;

    public function __construct(Account $account) {
        $this->model = $account;
    }

    public function getAllUser()
    {
        return $this->model->all();
    }

    public function findUsers($keyword)
    {
        return $this->model::where('StudentCode', 'like', "%{$keyword}%")
                      ->orWhere('Email', 'like', "%{$keyword}%")
                      ->orWhere('UserName', 'like', "%{$keyword}%")
                      ->get();
    }

    public function delete($userID)
    {
        $user = $this->model->find($userID);

        return $user ? $user->delete() : false;
    }
}
?>