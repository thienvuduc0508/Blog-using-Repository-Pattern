@extends('admin.master')
@section('content')
        <form action="{{route('permission.update',$permission->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center mt-3">Update Permission</h1>

            <div class="form-group">
                <label class="form-group">Name</label>
                <input type="text" name="name" class="form-control" value="{{$permission->name}}">
                @if($errors->has('name'))
                    <p class="alert-danger">
                        {{$errors->first('name')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Description</label>
                <textarea class="form-control" id="ckeditor" name="description" >{{$permission->description}}</textarea>
                @if($errors->has('description'))
                    <p class="alert-danger">
                        {{$errors->first('description')}}
                    </p>
                @endif
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Update">
                <a href="{{route('permission.index')}}">
                    <input type="button" class="btn btn-secondary" value="Back">
                </a>
            </div>
        </form>
@endsection
