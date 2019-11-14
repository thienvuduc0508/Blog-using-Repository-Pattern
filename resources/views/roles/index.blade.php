@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>List Role</h1>
                <a href="{{route('role.create')}}">
                    <button class="btn btn-success">Create New Role</button>
                </a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(count($roles) == 0)
                    <div class="alert-danger" style="text-align: center">Role is not available</div>
                @else
                    <table class="table table-striped text-center mt-2">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach($roles as $key=>$role)
                            <tr style="font-size: 20px">
                                <td>{{++$key}}</td>
                                <td>{{$role->name}}</td>
                                <td>{!! str_limit($role->description,50) !!}</td>

                                <td>
                                    <a href="{{route('role.edit',$role->id)}}"><button type="button" class="btn btn-outline-primary">
                                            <i class="fa fa-btn fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="{{route("role.delete",$role->id)}}"><button type="button" class="btn btn-outline-danger"
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
