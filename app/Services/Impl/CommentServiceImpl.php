<?php


namespace App\Services\Impl;


use App\Comment;
use App\Repositories\CommentRepositoryInterface;
use App\Services\CommentServiceInterface;
use Illuminate\Support\Facades\Auth;

class CommentServiceImpl extends ServiceImpl implements CommentServiceInterface
{

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->repository = $commentRepository;
    }
    public function createCommentInPost($request, $postId)
    {

            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['post_id'] = $postId;
            $this->repository->create($data);


    }
}

