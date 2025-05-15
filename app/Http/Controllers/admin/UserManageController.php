<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserManageServiceInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Institute;

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
        $departments = Department::all();
        $institutes = Institute::all();

        return view('contacts-list', compact('users', 'departments', 'institutes'));
    }


    public function findUsers(Request $request)
    {
        $keyword = $request->input('keyword');

        $users = $this->userManageService->findUsers($keyword);

        return redirect()->to('contacts-list')->with('users', $users);
    }

    public function delete($userID)
    {
        $delete = $this->userManageService->delete($userID);

        if ($delete) {
            return redirect()->to('contacts-list')->with('success', 'Xoa thanh cong!');
        } else {
            return redirect()->to('contacts-list')->with('error', 'Xoa that bai!');
        }
    }

    public function update(Request $request, $userID)
    {
        $validator = Validator::make($request->all(), [
            'UserName' => 'string',
            'FullName' => 'string',
            'StudentCode' => 'string',
            'Email' => 'email',
            'PhoneNumber' => 'string',
            'Address' => 'string',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'InstituteID' => 'required|exists:institutes,InstituteID',
            'ClassName' => 'string',
            'dob' => 'string',
            'Avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'UserName',
            'FullName',
            'StudentCode',
            'Email',
            'PhoneNumber',
            'Address',
            'DepartmentID',
            'InstituteID',
            'ClassName',
            'dob',
            'Avatar',
        ]);

        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('images', 'public');
            $data['Avatar'] = $avatarPath;
        }

        $update = $this->userManageService->update($userID, $data);

        if ($update) {
            return redirect()->to('contacts-list')->with('success', 'Update successfully!');
        } else {
            return redirect()->to('contacts-list')->with('error', 'Update failed!');
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'UserName' => 'string',
            'FullName' => 'string',
            'StudentCode' => 'string',
            'Email' => 'email',
            'PhoneNumber' => 'string',
            'Address' => 'string',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'InstituteID' => 'required|exists:institutes,InstituteID',
            'ClassName' => 'string',
            'dob' => 'string',
            'Avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'UserName',
            'FullName',
            'StudentCode',
            'Email',
            'PhoneNumber',
            'Address',
            'DepartmentID',
            'InstituteID',
            'ClassName',
            'dob',
            'Avatar',
            'Password',
        ]);

        $data['Password'] = Hash::make($data['Password']);

        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('images', 'public');
            $data['Avatar'] = $avatarPath;
        }

        $create = $this->userManageService->create($data);

        if ($create) {
            return redirect()->to('contacts-list')->with('success', 'Create successfully!');
        } else {
            return redirect()->to('contacts-list')->with('error', 'Create failed!');
        }
    }
}
