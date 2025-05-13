<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\RegisterServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(RegisterServiceInterface $registerService)
    {
        $this->registerService = $registerService;
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'UserName' => 'required|string|max:100',
            'StudentCode' => 'nullable|string|max:20',
            'Password' => 'required|string',
            'Email' => 'required|email|max:100|unique:account,Email'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['UserName', 'StudentCode', 'Email', 'Password']);

        $this->registerService->register($data);

        return redirect()->route('login.login')->with('success', 'Registration successful. Please log in.');
    }
}
?>