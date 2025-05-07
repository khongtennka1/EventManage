<?php

namespace App\Repositories\Interfaces;

interface UserManageRepositoryInterface
{
    public function getAllUser();
    public function findUsers($keyword);
    public function delete($userID);
    
}
?>