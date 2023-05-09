@extends ('layout')

@section('title')
    Register
@endsection

@section('content')


            <div class="container postision-register">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="imgStyleCardReg d-flex justify-content-center align-items-center">
                <span class="cardTextStyle text-center text-capitalize">
                    Already have An Admin Account ? <br>
                           <button class="btn btn-info d-flex w-25 justify-content-start mt-3" >
                               <a href="{{url('/login')}}">LOGIN</a>
                           </button>

                </span>

                        </div>
                    </div>
                    <div class="col-sm-6 mt-5">
                        <form action="{{url('/register')}}" method="post" class="container continer-reg">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="name" name="name" class="form-control acc-style w-50"  aria-describedby="emailHelp">
                                @if($errors->has('name'))
                                    <small class="form-text invalid-feedback">{{$errors->first('name')}}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control acc-style w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @if($errors->has('email'))
                                    <small class="form-text invalid-feedback">{{$errors->first('email')}}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="address" name="address" class="form-control acc-style w-50" aria-describedby="address">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control acc-style w-50" id="exampleInputPassword1">
                                @if($errors->has('password'))
                                    <small class="form-text invalid-feedback">{{$errors->first('password')}}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Verify Password</label>
                                <input type="password" name="password_confirmation" class="form-control acc-style w-50" id="exampleInputPassword1">
                                @if($errors->has('password'))
                                    <small class="form-text invalid-feedback">{{$errors->first('password')}}</small>
                                @endif
                            </div>
                            <div>
                                <button type="submit" value="register" class="btn btn-info-login mt-3 w-50">Register</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>







@endsection
