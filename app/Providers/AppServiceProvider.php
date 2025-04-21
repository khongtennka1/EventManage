<?php

namespace App\Providers;

use App\Models\Account;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\RegisterRepositoryInterface;
use App\Repositories\RegisterRepository;
use App\Repositories\LoginRepository;
use App\Repositories\LoginRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(RegisterRepositoryInterface::class, RegisterRepository::class);
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() : void
    {
        //
        // Route::pattern('UserID', '[0-9]+');

        // Route::model('account', Account::class);

        // Route::bind('account', function (string $value) {
        //     return Account::where('name', $value)->firstOrFail();
        // });
    }
}
