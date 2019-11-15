@extends('admin.master')
@section('title', 'Edit User')
@section('content')
    @if($user->id !== 1)
    <div class="container justify-content-center">
        <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center mt-3">Update User</h1>
            <div class="form-group">
                <label class="form-group">Name</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                @if($errors->has('name'))
                    <p class="alert-danger">
                        {{$errors->first('name')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Email</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled>
                @if($errors->has('email'))
                    <p class="alert-danger">
                        {{$errors->first('email')}}
                    </p>
                @endif
            </div>

            <div class="form-group">
                <label class="form-group">Role</label>
                @foreach($roles as $role)
                    <div class="form-check">
                        <input {{$rolesOfUser->contains($role->id) ? 'checked' : ''}}
                            type="checkbox" class="form-check-input"  name="role[]" value="{{$role->id}}" multiple="multiple">
                        <label for="exampleCheck1" class="form-check-label">{{$role->name}}</label>
                    </div>
                @endforeach
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Update">
                <a href="{{route('user.index')}}">
                    <input type="button" class="btn btn-secondary" value="Back">
                </a>
            </div>
        </form>
    </div>
    @else
        <h1>Không thể sửa đổi tài khoản này</h1>
@endif
@endsection
