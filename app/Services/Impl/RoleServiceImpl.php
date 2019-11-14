<?php


namespace App\Services\Impl;


use App\Permission;
use App\Repositories\PermissionRepositoryInterface;
use App\Repositories\RoleRepositoryInterface;
use App\Role;
use App\Services\RoleServiceInterface;
use Illuminate\Support\Facades\DB;

class   RoleServiceImpl extends ServiceImpl implements RoleServiceInterface
{
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->repository = $roleRepository;
    }
    public function create($request)
    {
        $roleCreate = $this->repository->create([
            'name' => $request->name,
            'description' => $request->description

        ]);
        $permission = $request->permission;
        $roleCreate->permissions()->attach($permission);
    }
    public function update($request, $id)
    {
     $data = $this->repository->findById($id);
     $data['name'] = $request->name;
     $data['description'] = $request->description;
     $this->repository->update($data);
     DB::table('permission_roles')->where('role_id',$id)->delete();
     $newRole = $this->repository->findById($id);
     $permission = $request->permission;
     $newRole->permissions()->attach($permission);
    }
    public function destroy($id)
    {
        $role = $this->repository->findById($id);
        $role->delete($id);
        $role->permissions()->detach();
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }


}
