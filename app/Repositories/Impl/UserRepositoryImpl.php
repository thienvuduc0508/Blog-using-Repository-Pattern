<?php


namespace App\Repositories\Impl;


use App\Repositories\UserRepositoryInterface;
use App\User;

class UserRepositoryImpl extends EloquentRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return $this->model = User::class;
    }
}
