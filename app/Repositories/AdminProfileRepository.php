<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\AdminProfileRepositoryInterface;

class AdminProfileRepository implements AdminProfileRepositoryInterface
{
    protected $model;

    public function __construct(Account $account) {
        $this->model = $account;
    }

    public function show($userID)
    {
        return $this->model->find($userID);
    }

    public function update($userID, array $data)
    {
        $user = $this->model->find($userID);

        if ($user){
            $user->update($data);
            return $user;
        }

        return null;
    }

    // public function removeAvatar($UserID)
    // {
    //     $user = Account::find($UserID);
        
    //     if ($user && $user->Avatar){
    //         $avatarPath = public_path($user->Avatar);

    //         if (file_exists($avatarPath)){
    //             unlink($avatarPath);
    //         }

    //         $user->Avatar = null;
    //         $user->save();
    //     }
    // }

    public function changePassword($userID, $currentPassword, $newPassword, $confirmPassword)
    {
        $user = $this->model->find($userID);

        if ($user && Hash::check($currentPassword, $user->Password)) {
            $user->Password = Hash::make($newPassword);
            $user->save();
            
            return true;
        }

        return false;
    }

    public function delete($userID, $password)
    {
        $user = $this->model->find($userID);

        if ($user && Hash::check($password, $user->Password)) {
            $user->delete();
            return true;
        }

        return false;
    }
}
?>