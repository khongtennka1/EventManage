<?php

namespace App\Providers;

use App\Repositories\Interfaces\RegisterRepositoryInterface;
use App\Repositories\RegisterRepository;
use App\Services\RegisterService;
use App\Services\Interfaces\RegisterServiceInterface;
use App\Repositories\LoginRepository;
use App\Repositories\Interfaces\LoginRepositoryInterface;
use App\Services\LoginService;
use App\Services\Interfaces\LoginServiceInterface;
use App\Repositories\AdminProfileRepository;
use App\Repositories\EventManageRepository;
use App\Repositories\Interfaces\AdminProfileRepositoryInterface;
use App\Repositories\Interfaces\EventManageRepositoryInterface;
use App\Services\AdminProfileService;
use App\Services\Interfaces\AdminProfileServiceInterface;
use App\Repositories\UserManageRepository;
use App\Repositories\Interfaces\UserManageRepositoryInterface;
use App\Services\EventManageService;
use App\Services\Interfaces\EventManageServiceInterface;
use App\Services\Interfaces\UserManageServiceInterface;
use App\Services\UserManageService;
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
        $this->app->bind(RegisterServiceInterface::class, RegisterService::class);
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(AdminProfileRepositoryInterface::class, AdminProfileRepository::class);
        $this->app->bind(AdminProfileServiceInterface::class, AdminProfileService::class);
        $this->app->bind(UserManageRepositoryInterface::class, UserManageRepository::class);
        $this->app->bind(UserManageServiceInterface::class, UserManageService::class);
        $this->app->bind(EventManageRepositoryInterface::class, EventManageRepository::class);
        $this->app->bind(EventManageServiceInterface::class, EventManageService::class);
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
