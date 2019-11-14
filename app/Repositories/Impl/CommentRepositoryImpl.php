<?php


namespace App\Repositories\Impl;


use App\Comment;
use App\Repositories\CommentRepositoryInterface;

class CommentRepositoryImpl extends EloquentRepository implements CommentRepositoryInterface
{


    public function getModel()
    {
        return $this->model = Comment::class;
    }
}
