<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\AdminProfileServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    protected $userProfileService;

    public function __construct(AdminProfileServiceInterface $adminProfileService)
    {
        $this->userProfileService = $adminProfileService;
    }

    public function show()
    {
        $user =  $this->userProfileService->show();

        if (!$user) {
            return redirect()->route('login.login');
        }

        return view('user.profile', ['user' => $user]);
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
            'Gender' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('img', 'public');
            $data['Avatar'] = $avatarPath;
        }

        $data = $request->only([
            'UserName',
            'StudentCode',
            'Email',
            'PhoneNumber',
            'FullName',
            'Avatar',
            'Gender',
        ]);

        $this->userProfileService->updateProfile($userID, $data);
        return redirect()->route('user-profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string',
            'confirmPassword' => 'required|string|same:newPassword'
        ]);

        $userID = Auth::id();
        $result = $this->userProfileService->changePassword($userID, $request->currentPassword, $request->newPassword, $request->confirmPassword);

        if ($result) {
            return redirect()->route('userProfile')->with('success', 'Password changed succesfully!');
        }

        return back()->withErrors(['currentPassword' => 'Current password is incorrect!']);
    }
}
