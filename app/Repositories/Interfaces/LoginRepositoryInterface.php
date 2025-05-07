<?php

namespace App\Repositories\Interfaces;

interface LoginRepositoryInterface
{
    public function findBy(string $Email, $value);
}
?>