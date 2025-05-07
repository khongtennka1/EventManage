<?php

namespace App\Services;

use App\Services\Interfaces\AdminProfileServiceInterface;
use App\Repositories\Interfaces\AdminProfileRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AdminProfileService implements AdminProfileServiceInterface
{
    protected $adminProfileRepo;

    public function __construct(AdminProfileRepositoryInterface $adminProfileRepo) {
        $this->adminProfileRepo = $adminProfileRepo;
    }

    public function show()
    {
        $userID = Auth::id();
        return $this->adminProfileRepo->show($userID);
    }

    public function updateProfile($userID, array $data)
    {
        return $this->adminProfileRepo->update($userID, $data);

        // if($request->hasFile('Avatar')){
        // }
    }

    // public function removeAvatar($UserID)
    // {
    //     $this->adminProfileRepo->removeAvatar($UserID);
    // }

    public function changePassword($userID, $currentPassword, $newPassword, $confirmPassword)
    {
        if($newPassword == $confirmPassword){
            $this->adminProfileRepo->changePassword($userID, $currentPassword, $newPassword, $confirmPassword);
        }

        return false;
    }

    public function delete($userID, $password)
    {
        return $this->adminProfileRepo->delete($userID, $password);
    }
}
?>