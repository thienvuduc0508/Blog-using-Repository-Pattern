@extends("admin.master")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles->pluck('name')}}</td>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset("assets/vendors/base/vendors.bundle.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/demo/default/base/scripts.bundle.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/custom/datatables/datatables.bundle.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/demo/default/custom/crud/datatables/basic/basic.js")}}" type="text/javascript"></script>
@endsection
