@extends('layouts.app')
@section('content')
    <div class="container justify-content-center">
        <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center mt-3">Create new Role</h1>


            <div class="form-group">
                <label class="form-group">Name</label>
                <input type="text" name="name" class="form-control">
                @if($errors->has('name'))
                    <p class="alert-danger">
                        {{$errors->first('name')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Description</label>

                <textarea class="form-control" id="ckeditor" name="description" ></textarea>
                @if($errors->has('description'))
                    <p class="alert-danger">
                        {{$errors->first('description')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Permission</label>
                @if($errors->has('permission'))
                    <p class="alert-danger">
                        {{$errors->first('permission')}}
                    </p>
                @endif
                @foreach($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"  name="permission[]" value="{{$permission->id}}">
                        <label for="exampleCheck1" class="form-check-label">{{$permission->name}}</label>
                    </div>
                @endforeach
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Create">
                <a href="{{route('role.index')}}">
                    <input type="button" class="btn btn-secondary" value="Back">
                </a>
            </div>
        </form>
    </div>
@endsection
