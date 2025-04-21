<?php

namespace App\Services;

use App\Repositories\LoginRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    protected $loginRepo;

    public function __construct(LoginRepositoryInterface $loginRepo)
    {
        $this->loginRepo = $loginRepo;
    }

    public function login(array $data)
    {
        $account = $this->loginRepo->findBy('Email', $data['Email'] ?? null);

        if ($account) {
            dd($account);
            if (Hash::check($data['Password'], $account->Password)) {
                if ($account->IsActive == 0) {
                    return [
                        'success' => false,
                        'message' => 'Tài khoản của bạn đã bị khóa',
                    ];
                }

                Auth::login($account);
                request()->session()->regenerate();

                return [
                    'success' => true,
                    'message' => 'Đăng nhập thành công',
                ];
            }
        }

        return [
            'success' => false,
            'message' => 'Đăng nhập thất bại',
        ];
    }
}

?>