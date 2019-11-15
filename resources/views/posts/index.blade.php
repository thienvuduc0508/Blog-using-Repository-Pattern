@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1>List Post</h1>
            <a href="{{route('post.create')}}">
                <button class="btn btn-success">Create New Post</button>
            </a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(count($posts) == 0)
                <div class="alert-danger" style="text-align: center">Post is not available</div>
            @else
                <table class="table table-striped text-center mt-2">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach($posts as $key=>$post)
                        <tr style="font-size: 20px">
                            <td>{{++$key}}</td>
                            <td>{!! str_limit($post->title,20) !!}</td>
                            <td>{!! str_limit($post->body,28) !!}</td>
                            <td>
                                <img  src="{{asset("storage/$post->image")}}"
                                      style="width: 50px;height: 50px; border-radius: 50px">
                            </td>
                            <td>
                                <a href="{{route('post.edit',$post->id)}}"><button type="button" class="btn btn-outline-primary">
                                        <i class="fa fa-btn fa-edit"></i>
                                    </button>
                                </a>
                                <a href="{{route("post.delete",$post->id)}}"><button type="button" class="btn btn-outline-danger"
                                                                                     onclick=" return confirm('Bạn chắc chắn muốn xóa ?')">
                                        <i class="fa fa-btn fa-ban" ></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
