@extends ('UserLayout')

@section('title')
    HYPEHOODIS
@endsection


@section('content')

{{--  landing page  --}}
   <section class="section-one">
       <div class="container d-flex justify-content-center align-items-center container-one">
           <div class="mainDiv">
               <div class="row">
                   <div class="col">
                       <img src="/Onlineshopping.png" class="imgDesign" alt="main img" />
                   </div>
                   <div class="col d-flex justify-content-center align-items-center">
                       <h1 class="text-center fontStyle">
                           -50% <br></br> HypeHoods Store <br></br> <button>SHOP NOW</button>
                       </h1>
                   </div>
               </div>
           </div>
       </div>
       <div class="container d-flex justify-content-center BottomContainer">
           <div class="row">
               <div class="col-sm">
                   <div class="backIcon">
                       <img src="/truckfast.png"  alt="main img" />
                   </div>
                   <h5 class="textStyleFast">Fast Dliver</h5>
               </div>
               <div class="col-sm">
                   <div class="backIcon">
                       <img src="/shoppingcart.png"  alt="main img" />
                   </div>
                   <h5 class="textStyle">Easy buy</h5>
               </div>
               <div class="col-sm">
                   <div class="backIcon">
                       <img src="/callcalling.png"  alt="main img" />
                   </div>
                   <h5 class="textStylePhone">Customer Support</h5>
               </div>
           </div>
       </div>
   </section>
{{--  end landing page  --}}

{{--  first category section  --}}
<section>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <span class="buttonHoodies">HOODIES</span>
    </div>


<div class="container ">
    <div class="row display-container-user">

        @foreach($hoodies as $proudct)
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

    <div class="d-flex justify-content-center align-items-center">
        <a class="more-Button mb-4" href={{url('/hoodies')}}>EXPLORE MORE</a>
    </div>
</section>
{{--  end first category section  --}}

{{--  seconde category section  --}}
<section>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <span class="buttonHoodies">PANTS</span>
    </div>


    <div class="container ">
        <div class="row display-container-user">

            @foreach($pants as $proudct)
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

    <div class="d-flex justify-content-center align-items-center">
        <a class="more-Button mb-4" href={{url('/pants')}}>EXPLORE MORE</a>
    </div>
</section>
{{--  end seconde category section  --}}


{{--  Contact Us  --}}
        <div class="contactus-container">
            <div class="d-flex justify-content-center align-items-center mt-5">
                <span class="buttonHoodies mt-5">Get in touch</span>
            </div>
            <div class="container d-flex justify-content-center align-items-center" id="contac_us" >
                <div class="mt-3">
                    <div class="container">
                        @if(Session::has('message_send'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> {{Session::get('message_send')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @endif
                        <form method="POST" action="{{route('contact.send')}}" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                            <div class="col-sm">

                                    <div class="form-group">
                                        <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Name" name="name">
                                        @if($errors->has('name'))
                                            <small class="form-text invalid-feedback">{{$errors->first('name')}}</small>
                                        @endif
                                        <input type="email" class="form-control mt-3" id="exampleFormControlInput1" placeholder="Email@example.com" name="email">
                                        @if($errors->has('email'))
                                            <small class="form-text invalid-feedback">{{$errors->first('email')}}</small>
                                        @endif
                                        <input type="text" class="form-control mt-3" id="exampleFormControlInput1" placeholder="Subject" name="subject">
                                        @if($errors->has('subject'))
                                            <small class="form-text invalid-feedback">{{$errors->first('subject')}}</small>
                                        @endif
                                    </div>
                            </div>
                            <div class="col-sm">

                                <div class="form-group">
                                    <textarea class="form-control text-area-customize" placeholder="Message" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                    @if($errors->has('message'))
                                        <small class="form-text invalid-feedback">{{$errors->first('message')}}</small>
                                    @endif
                                </div>
                            </div>

                        </div>
                            <div class="d-flex justify-content-center align-items-center mt-2 mb-5">
                                <button class="btn btn-send-Now">
                                    Send Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
{{--  end Contact Us  --}}


@endsection

