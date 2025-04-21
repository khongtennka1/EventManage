<?php

namespace App\Repositories;

interface LoginRepositoryInterface
{
    public function findBy(string $attribute, $value);
}
?>