<?php

namespace App\Http\Controllers;

use App\Services\RoleServiceInterface;
use App\Services\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;
    protected $roleService;

    public function __construct(UserServiceInterface $userService,
                                RoleServiceInterface $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view("users.index",compact('users'));
    }

    public function edit($id)
    {
        $roles = $this->roleService->getAll();
        $user = $this->userService->findById($id);
        $rolesOfUser = DB::table('role_users')->where('user_id',$id)->pluck('role_id');
        return view("users.edit",compact('user','roles','rolesOfUser'));
    }

    public function update(Request $request,$id)
    {
        $this->userService->update($request,$id);
        Session::flash('success', 'Cập nhật người dùng thành công');
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        Session::flash('success', 'Xóa người dùng thành công');
        return redirect()->route('user.index');
    }
}
