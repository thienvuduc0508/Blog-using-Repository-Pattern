<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One|Biryani|Raleway:300|Source+Code+Pro|Muli"
          rel="stylesheet">
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
    <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
</head>
<body>
<div class="container-fluid">
    <header class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a href="{{route('home')}}"><img src="{{asset('storage/images/logo.png')}}" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('user.index')}}"><span class="span1">User Action</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('role.index')}}"><span class="span1">Role Action</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post.index')}}"><span class="span1">Post Action</span></a>
                    </li>

                <form class="form-inline search" >
                    <input class="form-control mr-sm-4" id="search" type="search" onkeyup="KeyUp()"
                           onkeydown="KeyDown()" placeholder="Search" aria-label="Search" size="30px">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><span class="span1">Login</span></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><span class="span1">Register</span></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           style="margin-left: 40px"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            <span class="span1">{{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick=" event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" style="margin-right: 5px"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
            </div>
        </nav>
    </header>
</div>
<main>
    @yield('content')
</main>
<script>
    CKEDITOR.replace('ckeditor');
</script>
    <script>
        function KeyUp() {
            document.getElementById('search').style.backgroundColor = 'white';
        }
        function KeyDown() {
            document.getElementById('search').style.backgroundColor = 'green';
        }
    </script>
</body>
@yield('script')

</html>
