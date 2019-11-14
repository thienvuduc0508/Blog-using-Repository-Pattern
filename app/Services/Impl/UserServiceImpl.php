<?php


namespace App\Services\Impl;


use App\Repositories\UserRepositoryInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\Facades\DB;

class UserServiceImpl extends ServiceImpl implements UserServiceInterface
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function update($request, $id)
    {
        $user = $this->repository->findById($id);
        $user->name = $request->name;
        $this->repository->update($user);
        DB::table('role_users')->where('user_id',$id)->delete();
        $user->roles()->attach($request->role);
    }
    public function destroy($id)
    {
        $user = $this->repository->findById($id);
        $user->delete($id);
        $user->roles()->detach();
    }
}
