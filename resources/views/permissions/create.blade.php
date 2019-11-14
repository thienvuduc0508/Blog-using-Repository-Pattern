@extends('layouts.app')
@section('content')
    <div class="container justify-content-center">
        <form action="{{route('permission.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center mt-3">Create new Permission</h1>


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
            <div>
                <input type="submit" class="btn btn-success" value="Create">
                <a href="{{route('permission.index')}}">
                    <input type="button" class="btn btn-secondary" value="Back">
                </a>
            </div>
        </form>
    </div>
@endsection
