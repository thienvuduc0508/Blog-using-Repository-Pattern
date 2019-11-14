<?php

namespace App\Providers;

use App\Repositories\CommentRepositoryInterface;
use App\Repositories\Impl\CommentRepositoryImpl;
use App\Repositories\Impl\PermissionRepositoryImpl;
use App\Repositories\Impl\PostRepositoryImpl;
use App\Repositories\Impl\RoleRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\PermissionRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\CommentServiceInterface;
use App\Services\Impl\CommentServiceImpl;
use App\Services\Impl\PermissionServiceImpl;
use App\Services\Impl\PostServiceImpl;
use App\Services\Impl\RoleServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\PermissionServiceInterface;
use App\Services\PostServiceInterface;
use App\Services\RoleServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostRepositoryInterface::class, PostRepositoryImpl::class);
        $this->app->singleton(PostServiceInterface::class, PostServiceImpl::class);
        $this->app->singleton(CommentRepositoryInterface::class, CommentRepositoryImpl::class);
        $this->app->singleton(CommentServiceInterface::class,CommentServiceImpl::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepositoryImpl::class);
        $this->app->singleton(UserServiceInterface::class, UserServiceImpl::class);
        $this->app->singleton(RoleRepositoryInterface::class, RoleRepositoryImpl::class);
        $this->app->singleton(RoleServiceInterface::class, RoleServiceImpl::class);
        $this->app->singleton(PermissionRepositoryInterface::class,PermissionRepositoryImpl::class);
        $this->app->singleton(PermissionServiceInterface::class, PermissionServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
