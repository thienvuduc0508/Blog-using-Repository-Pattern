@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4">{{$post->title}}</h1>
                <p class="lead">
                    by
                    <a href="#">{{$post->user->name}}</a>
                </p>
                <hr>
                <p>Posted on {{$post->updated_at}}</p>
                <hr>
                <img class="img-fluid rounded" src="{{asset('/storage/'.$post->image)}}"
                     style="width: 100%; height: 350px">
                <hr>
                <p>{!! $post->body !!} </p>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h3 style="text-align: center">Bình luận</h3>
                            <hr>
                                <div id="display-comment">

                                </div>
                            @if(Auth::user())
                                <h4 style="text-align: center">Add Comment</h4>
                                <div class="ml-5 mr-5 mb-3">
                                    <form id="comment_form" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
                                        </div>
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Send">
                                    </form>
                                </div>
                            @else
                                <p class="text-danger">You must be login to comment!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
        $(document).ready(function(){
            $('#comment_form').on('submit',function(event){
                event.preventDefault();
                var form_data = $('#comment_form').serialize();
                $.ajax({
                    url: '{{route('comment.create',$post->id)}}',
                    type: "POST",
                    data: form_data,
                        success: function(data){
                         $('#comment_form')[0].reset();
                         load_comment();
                    },
                    error: function() {
                        alert('An error occurred. Please try again later.');
                    }
                });
            });
            load_comment();
            function load_comment() {
                $.ajax({
                   url: '{{route('comment.show',$post->id)}}',
                   type: "GET",
                   success: function (data) {
                       $('#display-comment').html(data);
                   }
                });
            }
        });

    </script>
@endsection
