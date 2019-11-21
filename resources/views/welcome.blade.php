@extends("layouts.app")
@section('content')
    <div class="container slide">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('storage/images/2.jpg')}}" class="d-block w-100" alt="..." width="100%"
                                 height="350px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('storage/images/7.jpg')}}" class="d-block w-100" alt="..." width="100%"
                                 height="350px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('storage/images/8.jpg')}}" class="d-block w-100" alt="..." width="100%"
                                 height="350px">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(count($posts) == 0)
                <div class="text-danger"> Post is not available</div>
            @else
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <img src="{{asset('storage/'.$post->image)}}" alt="Card image cap"
                             style="width: 100%; height: 300px">
                        <h4 style="text-align: center; font-family: lusitana, serif; font-weight: bold">{!! str_limit($post->title,30) !!}</h4>
                        <div class="card-header text-muted" style="text-align: center">
                            {{__('messages.Posted on')}} {{$post->created_at}} {{__('messages.by')}}
                            @if(!empty($post->user->name))
                            <a href="#">{{$post->user->name}}</a>
                                @else
                                <a href="#"> {{__('messages.Unknown User')}}</a>
                                @endif
                        </div>
                        <div>
                            <p>{!! str_limit($post->body,100) !!}  </p>
                            <a href="{{route('post.detail',$post->id)}}" class="btn btn-primary">{{__('messages.Read More')}}
                                &rarr;</a>
                        </div>
                        <hr/>
                    </div>
                @endforeach
        </div>
    </div>
    <div class="d-flex">
        <div class="mx-auto">
            {{$posts->links("pagination::bootstrap-4")}}
        </div>
    </div>
    @endif
@endsection
