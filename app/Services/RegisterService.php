<?php

namespace App\Services;

use App\Repositories\RegisterRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    protected $registerRepo;

    public function __construct(RegisterRepositoryInterface $registerRepo)
    {
        $this->registerRepo = $registerRepo;
    }

    public function register(array $data)
    {
        return $this->registerRepo->create($data);
    }
}
?>