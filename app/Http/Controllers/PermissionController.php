<?php

namespace App\Http\Controllers;

use App\Services\PermissionServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(
        PermissionServiceInterface $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    public function index(){
        $permissions = $this->permissionService->getAll();
        return view("permissions.index",compact('permissions'));
    }

    public function create()
    {

        return view("permissions.create");
    }

    public function store(Request $request)
    {
        $this->permissionService->create($request);
        Session::flash('success','Tạo mới permission thành công');
        return redirect()->route('permission.index');
    }

    public function edit($id)
    {
        $permission = $this->permissionService->findById($id);
        return view("permissions.edit",compact('permission'));
    }

    public function update(Request $request,$id)
    {
        $this->permissionService->update($request,$id);
        Session::flash('success','Cập nhật permission thành công');
        return redirect()->route('permission.index');
    }

    public function destroy($id)
    {
        $this->permissionService->destroy($id);
        Session::flash('success','Xóa permission thành công');
        return redirect()->route('permission.index');

    }
}
