<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\LoginServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginServiceInterface $loginService)
    {
        $this->loginService = $loginService;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Email' => 'required|string|email',
            'Password' => 'required|string'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $dataLogin = $request->only(['Email', 'Password']);
    
        $result = $this->loginService->login($dataLogin);

        if ($result['success']){
            $user = Auth::user();

            if($user){
                if($user->Role == 1){
                    return redirect()->route('admin.dashboard');
                }

                else{
                    return redirect()->route('user.dashboard');
                }
            }
        }

        return redirect()->route('login.login')->withErrors(['login' => $result['message']]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        //huy session
        $request->session()->invalidate();
        //tao lai token csrf
        $request->session()->regenerateToken();

        return redirect()->route('login.login');
    }
}
?>