@auth()
@extends ('layout')

@section('title')
    Add Account
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-3">Create new</h1>

        <form method="POST" action="{{ route('account_register') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input name="name" type="text" class="form-control acc-style">

            </div>

            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input name="email" type="email" class="form-control acc-style">

            </div>

            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Password</span>
                </div>
                <input name="password" type="password" class="form-control acc-style">

            </div>

            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Verify Password</span>
                </div>
                <input name="password_confirmation" type="password" class="form-control acc-style">

            </div>

            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Role ID</label>
                </div>
                @foreach($roles as $role)
                <div class="form-check form-check-inline ml-3">
                    <input class="form-check-input" type="radio" name="role_id" value="{{$role->id}}" >
                    <label class="form-check-label" for="inlineRadio1">{{$role->name}}</label>
                </div>
                @endforeach
            </div>

            <input type="submit" value="store" class="btn create-button  mt-3 text-capitalize">
        </form>
    </div>
@endsection
@endauth
