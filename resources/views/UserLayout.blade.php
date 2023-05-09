<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,900&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" type="image/png" href="/Untitled-1.png"/>

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
<div class="nav-container-style">
    <nav class="navbar navbar-expand-lg navbar-light container ">
        <a class="navbar-brand img-logo" href="{{url('/')}}">
            <img src="/Untitled-1.png" width="150" height="150" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto top-nav-container">
                <li class="nav-item active test-img-container">
                    <div class="dropdown">
                        <button type="button" class="btn-cart top-nav-btns-cart btn" data-toggle="dropdown" >
                            <a class="nav-link" href="{{url('/shopping-cart')}}">
                                <img src="/shopping-cart.png" width="25" height="25" alt="logo">

                                    @if(session('cart') == null)
                                    <span>
                                    </span>
                                    @elseif(session('cart') != null)
                                    <span class="badge badge-pill badge-danger">
                                        {{count( (array) session('cart')  )}}
                                    </span>
                                    @endif
                                </span>
                            </a>
                        </button>


                        <div class="dropdown-menu">
                            <div class="row total-header-section">
                                @php
                                    $total = 0
                                @endphp

                                @foreach((array) session('cart') as $id=>$details)
                                    @php
                                        $total += $details['price'] * $details['quantity']
                                    @endphp
                                @endforeach

                                <div class="col-lg-12 col-sm-12 total-section text-right">
                                    <p>Total : <span class="text-info">${{$total}}</span></p>
                                </div>
                            </div>

                            @if(session('cart'))
                                @foreach(session('cart') as $id=>$details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ asset($details['img']) }}"  />
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['product_name'] }}</p>
                                            <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <a href="{{ route('cart') }}" class="btn btn-primary d-flex justify-content-center align-items-center btn-block">
                                        <span>
                                            View all
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>

                @auth()
                  <div class="d-flex">
                          <div class="dropdown  ">
                              <button class="btn btn-primary btn-logout-sub d-flex justify-content-center align-items-center btn-block dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                  Wanna Log Out?
                              </button>
                              <div class="dropdown-menu logout-button ">
                                  <form action="{{url('/logout')}}" method="post">
                                      @csrf
                                        <button class="btn btn-danger buton-poss" value="logout">
                                            logout
                                        </button>
                                  </form>
                              </div>
                          </div>

                  </div>
                @endauth

                @guest()
                <li class="nav-item active">

                    <a class=" account-btn ml-3" href="{{url('/login')}}">
                        <img src="/account.png" width="30" height="30" alt="">
                    </a>
                </li>
                @endguest
            </ul>
        </div>

    </nav>
</div>

<div class="container">
    <div class="lineNav">
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light container">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link navItemsText" href="{{url('/hoodies')}}"> HOODIES </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link navItemsText" href="{{url('/pants')}}">PANTS </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4 mb-4">
    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5>
                {{session('success')}}
            </h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
<div></div> @yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>

</html>
