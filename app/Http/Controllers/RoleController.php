<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Services\PermissionServiceInterface;
use App\Services\RoleServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    protected $roleService;
   protected $permissionService;

    public function __construct(RoleServiceInterface $roleService,
                               PermissionServiceInterface $permissionService)
    {
        $this->roleService = $roleService;
       $this->permissionService = $permissionService;
    }
    public function index(){
        $roles = $this->roleService->getAll();
        return view("roles.index",compact('roles'));
    }

    public function create()
    {

        $permissions = $this->permissionService->getAll();
        return view("roles.create",compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->roleService->create($request);
        Session::flash('success','Tạo mới role thành công');
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = $this->roleService->findById($id);
        $permissions = $this->permissionService->getAll();
        $permissionsOfRole = DB::table('permission_roles')->where('role_id',$id)->pluck('permission_id');
        return view("roles.edit",compact('role','permissions','permissionsOfRole'));
    }

    public function update(Request $request,$id)
    {
        $this->roleService->update($request,$id);
        Session::flash('success','Cập nhật role thành công');
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $this->roleService->destroy($id);
        Session::flash('success','Xóa role thành công');
        return redirect()->route('role.index');

    }
}
