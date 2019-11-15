@extends('admin.master')
@section('title','List User')
@section('content')
    <div class="container">
     <div class="row">
         <div class="col-md-12">
             <h1>List User</h1>
             @if (session('success'))
                 <div class="alert alert-success">
                     {{ session('success') }}
                 </div>
             @endif
             @if(count($users) == 0)
                 <div class="alert-danger" style="text-align: center">User is not available</div>
             @else
                 <table class="table table-striped text-center mt-2">
                     <tr>
                         <th>#</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Action</th>
                     </tr>
                     @foreach($users as $key=>$user)
                         <tr style="font-size: 20px">
                             <td>{{++$key}}</td>
                             <td>{{$user->name}}</td>
                             <td>{{$user->email}}</td>
                             <td>
                                 <a href="{{route('user.detail',$user->id)}}"><button type="button" class="btn btn-outline-warning">
                                         <i class="fa fa-btn fa-eye"></i>
                                     </button></a>
                                     <a href="{{route('user.edit',$user->id)}}"><button type="button" class="btn btn-outline-primary">
                                             <i class="fa fa-btn fa-edit"></i>
                                         </button>
                                     </a>
                                     <a href="{{route("user.delete",$user->id)}}"><button type="button" class="btn btn-outline-danger"
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
