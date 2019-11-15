@extends('admin.master')
@section('content')
    <div class="container justify-content-center">
        <form action="{{route('role.update',$role->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center mt-3">Update Role</h1>

            <div class="form-group">
                <label class="form-group">Name</label>
                <input type="text" name="name" class="form-control" value="{{$role->name}}">
                @if($errors->has('name'))
                    <p class="alert-danger">
                        {{$errors->first('name')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Description</label>
                <textarea class="form-control" id="ckeditor" name="description" >{{$role->description}}</textarea>
                @if($errors->has('description'))
                    <p class="alert-danger">
                        {{$errors->first('description')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Permission</label>
                @foreach($permissions as $permission)
                <div class="form-check">
                    <input {{$permissionsOfRole->contains($permission->id)? 'checked' : ''}}
                        type="checkbox" class="form-check-input"  name="permission[]" value="{{$permission->id}}">
                    <label for="exampleCheck1" class="form-check-label">{{$permission->name}}</label>
                </div>
                    @endforeach
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Update">
                <a href="{{route('role.index')}}">
                    <input type="button" class="btn btn-secondary" value="Back">
                </a>
            </div>
        </form>
    </div>
@endsection
