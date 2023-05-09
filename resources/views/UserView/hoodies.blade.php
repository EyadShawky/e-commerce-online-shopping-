@extends ('UserLayout')

@section('title')
    HOODIES
@endsection


@section('content')

    {{--  first category section  --}}
    <section>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <span class="buttonHoodies">HOODIES</span>
        </div>


        <div class="container ">
            <div class="row display-container-user">

                @foreach($proudcts as $proudct)
                    <div class="col-sm-3 marigen-user-page mt-5 mb-4">
                        <div class="card cardStyle">
                            <img src="{{asset(($proudct->img))}}" class="card-img-top" alt="{{$proudct->product_name}}"/>
                            <div class="d-flex justify-content-between">
                                <div class="card-body">
                                    <h5 class="card-title">{{$proudct->product_name}}</h5>
                                    <p class="card-text">{{$proudct->price}}</p>
                                </div>

                                <div class="add-button mr-4 btn"  role="button">
                                    <a href="{{route('add_to_cart' , $proudct->id)}}">
                                        <img class="cart-img" src="/add.png" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    {{--  end first category section  --}}



@endsection

