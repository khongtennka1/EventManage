<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Services\Interfaces\AdminProfileServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

        return view('contacts-profile', ['user' => $user]);  
    }

    public function update(Request $request, $userID)
    {
        $validator = Validator::make($request->all(), [
            'UserName' => 'string',
            'Email' => 'email',
            'PhoneNumber' => 'string',
            'dob' => 'string',
            'Avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'UserName',
            'Email',
            'PhoneNumber',
            'dob',
            'Avatar',
        ]);

        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('images', 'public');
            $data['Avatar'] = $avatarPath;
        }

        $this->adminProfileService->updateProfile($userID, $data);
        return redirect()->to('contacts-profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string',
            'confirmPassword' => 'required|string|same:newPassword'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->currentPassword, $user->Password)) {
        return back()->withErrors(['currentPassword' => 'Current password is incorrect!']);
       }

        $userID = Auth::id();
        $result = $this->adminProfileService->changePassword($userID, $request->currentPassword, $request->newPassword, $request->confirmPassword);

        if ($result) {
            return redirect()->route('admin_profile')->with('success', 'Password changed successfully!');
        }

        return back()->withErrors(['currentPassword' => 'Current password is incorrect!']);
    }
}
