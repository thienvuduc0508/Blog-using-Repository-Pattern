<?php


namespace App\Services\Impl;

use App\Repositories\PermissionRepositoryInterface;
use App\Services\PermissionServiceInterface;

class PermissionServiceImpl extends ServiceImpl implements PermissionServiceInterface
{
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
       $this->repository = $permissionRepository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function create($request)
    {
        $data = $request->all();
        $this->repository->create($data);

    }

    public function update($request, $id)
    {
        $data = $this->repository->findById($id);
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $this->repository->update($data);
    }
}
