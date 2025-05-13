<?php

namespace App\Repositories\Interfaces;

interface UserManageRepositoryInterface
{
    public function getAllUser();
    public function findUsers($keyword);
    public function delete($userID);
    public function update($userID, $data);
    public function create($data);
}
?>