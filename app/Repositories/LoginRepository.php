<?php
namespace App\Repositories;

use App\Models\Account;
use App\Repositories\LoginRepositoryInterface;

class LoginRepository implements LoginRepositoryInterface
{
    protected $model;

    public function __construct(Account $account)
    {
        $this->model = $account;
    }

    public function findBy(string $attribute, $value)
    {
        return $this->model->where($attribute, $value)->first();
    }
}
?>