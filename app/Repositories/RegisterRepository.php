<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class RegisterRepository implements RegisterRepositoryInterface
{
    protected $model;

    public function __construct(Account $account)
    {
        $this->model = $account;
    }

    public function create(array $data)
    {
        $data['Password'] = Hash::make($data['Password']);
        return $this->model->create($data);
    }
}
?>