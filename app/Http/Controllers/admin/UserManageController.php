<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserManageServiceInterface;
use App\Services\UserManageService;

class UserManageController extends Controller
{
    protected $userManageService;

    public function __construct(UserManageServiceInterface $userManageService)
    {
        $this->userManageService = $userManageService;
    }

    public function getAllUser()
    {
        $users = $this->userManageService->getAllUser();

        $admins = $users->where('Role', 1);
        $users = $users->where('Role', 0);

        return view('admin.user_manage', compact('admins', 'users'));
    }


    public function findUsers(Request $request)
    {
        $keyword = $request->input('keyword');

        $users = $this->userManageService->findUsers($keyword);

        $admins = $users->where('Role', 1);
        $users = $users->where('Role', 0);

        return view('admin.user_manage', compact('admins', 'users'));
    }

    public function delete($userID)
    {
        $delete = $this->userManageService->delete($userID);

        if ($delete) {
            return redirect()->route('user_manage')->with('success', 'Xoa thanh cong!');
        } else {
            return redirect()->route('user_manage')->withErrors('delete', 'Xoa that bai!');
        }
    }
}
