@extends('admin.master')
@section('content')
    <div class="container justify-content-center">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center mt-3">Create new Post</h1>
            <div class="form-group">
                <input type="text" hidden name="user_id" value="{{$userId}}" class="form-control">
            </div>

            <div class="form-group">
                <label class="form-group">Title</label>
                <input type="text" name="title" class="form-control">
                @if($errors->has('title'))
                    <p class="alert-danger">
                        {{$errors->first('title')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Body</label>

                <textarea class="form-control" id="ckeditor" name="body" ></textarea>
                @if($errors->has('body'))
                    <p class="alert-danger">
                        {{$errors->first('body')}}
                    </p>
                @endif

            </div>
            <div class="form-group">
                <label class="form-group">Image</label>
                @if($errors->has('image'))
                    <p class="alert-danger">
                        {{$errors->first('image')}}
                    </p>
                @endif
                <div class="form-group">
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Create">
                <a href="{{route('post.index')}}">
                    <input type="button" class="btn btn-secondary" value="Back">
                </a>
            </div>
        </form>
    </div>
@endsection
