<?php

namespace App\Services\Interfaces;

interface UserManageServiceInterface
{
    public function getAllUser();
    public function findUsers($keyword);
    public function delete($userID);
    public function update($userID, $data);
    public function create($data);
}
?>