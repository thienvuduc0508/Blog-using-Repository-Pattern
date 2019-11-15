
@extends("admin.master")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                List Post
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('post.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>New Post</span>
												</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(count($posts) == 0)
                        <div class="alert-danger" style="text-align: center">Post is not available</div>
                    @else
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $key=>$post)
                                <tr style="font-size: 20px">
                                    <td>{{++$key}}</td>
                                    <td>{!! str_limit($post->title,20) !!}</td>
                                    <td>{!! str_limit($post->body,28) !!}</td>
                                    <td>
                                        <img  src="{{asset("storage/$post->image")}}"
                                              style="width: 50px;height: 50px; border-radius: 50px">
                                    </td>
                                    <td>
                                        <a href="{{route('post.edit',$post->id)}}"><button type="button" class="btn btn-outline-primary">
                                                <i class="fa fa-btn fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="{{route("post.delete",$post->id)}}"><button type="button" class="btn btn-outline-danger"
                                                                                             onclick=" return confirm('Bạn chắc chắn muốn xóa ?')">
                                                <i class="fa fa-btn fa-ban" ></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                        {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
    {{--    <script src="{{asset("assets/vendors/base/vendors.bundle.js")}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset("assets/demo/default/base/scripts.bundle.js")}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset("assets/vendors/custom/datatables/datatables.bundle.js")}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset("assets/demo/default/custom/crud/datatables/basic/basic.js")}}" type="text/javascript"></script>--}}
@endsection
