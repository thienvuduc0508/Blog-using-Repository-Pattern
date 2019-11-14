<?php


namespace App\Repositories\Impl;


use App\Permission;
use App\Repositories\PermissionRepositoryInterface;

class PermissionRepositoryImpl extends EloquentRepository implements PermissionRepositoryInterface
{

    public function getModel()
    {
        return $model = Permission::class;
    }

}
