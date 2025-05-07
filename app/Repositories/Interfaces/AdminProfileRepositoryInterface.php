<?php

namespace App\Repositories\Interfaces;

interface AdminProfileRepositoryInterface
{
    public function show($userID);
    public function update($userID, array $data);
    // public function removeAvatar($UserID);
    public function changePassword($userID, $currentPassword, $newPassword, $confirmPassword);
    public function delete($userID, $password);
}
?>