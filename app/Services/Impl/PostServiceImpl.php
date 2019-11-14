<?php


namespace App\Services\Impl;


use App\Post;
use App\Repositories\PostRepositoryInterface;
use App\Services\PostServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class PostServiceImpl extends ServiceImpl implements PostServiceInterface
{

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->repository = $postRepository;
    }


    public function create($request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        if ($request->hasfile('image')){
            $data['image'] = $request->file('image')->store('images','public');
        }
        $this->repository->create($data);

    }

    public function update($request, $id)
    {
        $data = $this->repository->findById($id);
        $data['title'] = $request->title;
        $data['body'] = $request->body;
        if ($request->hasFile('image')) {
            $currentImage = $data->image;
            Storage::delete('/public/'.$currentImage);
            $data['image'] = $request->file('image')->store('images','public');
        }
        $this->repository->update($data);
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }

}
