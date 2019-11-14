<?php

namespace App\Http\Controllers;

use App\Services\CommentServiceInterface;
use App\Services\PostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    protected $commentService;
    protected $postService;

    public function __construct(CommentServiceInterface $commentService,
                                PostServiceInterface $postService)
    {
        $this->commentService = $commentService;
        $this->postService = $postService;
    }
    public function createCommentInPost(Request $request,$postId){
        if ($request->ajax()) {
            $post = $this->postService->findById($postId);
            $this->commentService->createCommentInPost($request, $postId);
            Session::flash('success', 'The Comment Was Added!');
        }

    }
    public function show($postId){
        $post = $this->postService->findById($postId);
        $comment = $post->comments;
        return view("posts.showComment",compact('post','comment'));
    }


}
