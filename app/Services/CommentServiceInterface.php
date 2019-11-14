<?php


namespace App\Services;


interface CommentServiceInterface extends ServiceInterface
{
    public function createCommentInPost($request,$postId);
}
