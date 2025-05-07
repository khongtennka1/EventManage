<?php
namespace App\Repositories;

use App\Models\Account;
use App\Repositories\Interfaces\LoginRepositoryInterface;

class LoginRepository implements LoginRepositoryInterface
{
    protected $model;

    public function __construct(Account $account)
    {
        $this->model = $account;
    }

    public function findBy(string $Email, $value)
    {
        return $this->model->where($Email, $value)->first();
    }
}
?>