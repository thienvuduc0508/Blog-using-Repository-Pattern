<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Services\PostServiceInterface;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService
                                )
    {
        $this->postService = $postService;
    }
    public function index(){
        $posts = $this->postService->getAll();
        return view("posts.index",compact('posts'));
    }

    public function create()
    {
            $userId = Auth::id();
            return view("posts.create",compact("userId"));

    }

    public function store(CreatePostRequest $request)
    {
        $this->postService->create($request);
        Session::flash('success','Tạo mới bài viết thành công');
        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $userId = Auth::id();
        $post = $this->postService->findById($id);
        return view("posts.edit",compact('post','userId'));
    }

    public function show($id)
    {
        $post = $this->postService->findById($id);
        return view("posts.detail",compact('post'));
    }
    public function update(UpdatePostRequest $request, $id)
    {

        $this->postService->update($request,$id);
        Session::flash('success','Cập nhật bài viết thành công');
        return redirect()->route('post.index');
    }
    public function destroy($id){
        $this->postService->destroy($id);
        Session::flash('success','Xóa bài viết thành công');
        return redirect()->route('post.index');
    }
}
