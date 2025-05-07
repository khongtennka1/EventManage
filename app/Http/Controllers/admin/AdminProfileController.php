<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Services\Interfaces\AdminProfileServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    protected $adminProfileService;

    public function __construct(AdminProfileServiceInterface $adminProfileService)
    {
        $this->adminProfileService = $adminProfileService;
    }

    public function show()
    {
        $user = $this->adminProfileService->show();

        if (!$user){
            return redirect()->route('login.login');
        }

        return view('admin.admin_profile', ['user' => $user]);  
    }

    public function update(Request $request, $userID)
    {
        $validator = Validator::make($request->all(), [
            'UserName' => 'string',
            'StudentCode' => 'string',
            'Email' => 'email',
            'PhoneNumber' => 'string',
            'FullName' => 'string',
            'Avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('img', 'public');
        }

        $data = $request->only([
            'UserName',
            'StudentCode',
            'Email',
            'PhoneNumber',
            'FullName',
            'Avatar'
        ]);

        $data['Avatar'] = $avatarPath;

        $this->adminProfileService->updateProfile($userID, $data);
        return redirect()->route('admin_profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string',
            'confirmPassword' => 'required|string|same:newPassword'
        ]);

        $userID = Auth::id();
        $result = $this->adminProfileService->changePassword($userID, $request->currentPassword, $request->newPassword, $request->confirmPassword);

        if ($result) {
            return redirect()->route('admin_profile')->with('success', 'Password changed successfully!');
        }

        return back()->withErrors(['currentPassword' => 'Current password is incorrect!']);
    }
}
