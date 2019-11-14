<?php


namespace App\Repositories\Impl;


use App\Post;
use App\Repositories\PostRepositoryInterface;

class PostRepositoryImpl extends EloquentRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return $model = Post::class;
    }

    public function getAll()
    {
        return $this->model->paginate(5);
    }





}
