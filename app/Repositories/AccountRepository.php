<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository
{
    public function create(array $data)
    {
        return Account::create($data);
    }

    public function findByStudentCode(string $studentCode)
    {
        return Account::where('StudentCode', $studentCode);
    }

    public function findByEmail(string $email)
    {
        return Account::where('Email', $email);
    }

    public function findById(int $userID)
    {
        return Account::findOrFail($userID);
    }
}

