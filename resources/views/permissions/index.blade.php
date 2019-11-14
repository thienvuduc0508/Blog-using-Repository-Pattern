@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>List Role</h1>
                <a href="{{route('permission.create')}}">
                    <button class="btn btn-success">Create New Permission</button>
                </a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(count($permissions) == 0)
                    <div class="alert-danger" style="text-align: center">Permission is not available</div>
                @else
                    <table class="table table-striped text-center mt-2">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach($permissions as $key=>$permission)
                            <tr style="font-size: 20px">
                                <td>{{++$key}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{!! str_limit($permission->description,50) !!}</td>

                                <td>
                                    <a href="{{route('permission.edit',$permission->id)}}"><button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-btn fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="{{route("permission.delete",$permission->id)}}"><button type="button" class="btn btn-outline-danger"
                                                                                         onclick=" return confirm('Bạn chắc chắn muốn xóa ?')">
                                            <i class="fa fa-btn fa-ban" ></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @endif

                    </table>

            </div>
        </div>
    </div>
@endsection
