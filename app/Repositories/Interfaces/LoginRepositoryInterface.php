<?php

namespace App\Repositories\Interfaces;

interface LoginRepositoryInterface
{
    public function findBy(string $Email, $value);
    // public function forgotPassword(string $Email, string $token);
    // public function rememberMe(string $Email, string $token);
}
?>