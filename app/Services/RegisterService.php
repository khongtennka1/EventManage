<?php

namespace App\Services;

use App\Repositories\Interfaces\RegisterRepositoryInterface;
use App\Services\Interfaces\RegisterServiceInterface;
use Illuminate\Support\Facades\Hash;

class RegisterService implements RegisterServiceInterface
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