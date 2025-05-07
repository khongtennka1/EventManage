<?php

namespace App\Services\Interfaces;

interface AdminProfileServiceInterface
{
    public function show();
    public function updateProfile($userID, array $data);
    public function changePassword($userID, $currentPassword, $newPassword, $confirmPassword);
    public function delete($userID, $password);
}
?>