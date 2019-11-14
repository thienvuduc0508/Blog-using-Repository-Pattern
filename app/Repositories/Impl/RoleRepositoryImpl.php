<?php


namespace App\Repositories\Impl;


use App\Repositories\RoleRepositoryInterface;
use App\Role;

class RoleRepositoryImpl extends EloquentRepository implements RoleRepositoryInterface
{

    public function getModel()
    {
        return $this->model = Role::class;
    }


}
