<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="/Untitled-1.png"/>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @yield('page-style')


    <style>
        a {
                color: white;
                text-decoration: none;
                text-decoration-line: none;
            }

        a:hover {
            color: white;
            text-decoration-line: none;
        }
    </style>
</head>

<body>


<header>





    <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand " href="#">
            <img src="/Untitled-1.png" class="nav-container-style" width="150" height="150" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav na-admin m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/categories')}}">CATEGORY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/products')}}">PRODUCT</a>
                </li>
                @if(auth()->user()?->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/accounts')}}">ACCOUNTS</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/customers')}}">CUSTOMERS</a>
                </li>
            </ul>


            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link brand-dashboard" href="{{url('/')}}">
                        <img src="/HH.png" class="nav-container-style" width="150" height="150" alt="">
                        </a>
                    </li>

                </ul>
                <form action="{{url('/logout')}}" method="post">
                    @csrf
                    <input  type="image" src="/logout (1).png" width="40" height="40" value="logout" class="rounded-pill mr-5 mt-3 na-logout">
                </form>
            </div>

            @endauth

            @guest()
            <div class="ml-auto">
                <a href="{{url('/login')}}">
                    <img src="/account.png" class="nav-container-style" width="40" height="40" alt="">
                </a>
            </div>
            @endguest
        </div>
    </nav>

</header>



<!--Main layout-->

<main style=>

</main> @yield('content')

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
@yield('page-scripts')
</body>

</html>



