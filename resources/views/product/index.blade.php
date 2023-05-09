@auth()
@extends ('layout')


@section('content')
<div class="display-right-container">



    <div class="container d-flex justify-content-between mb-5">
        <h3>
            PRODUCT
        </h3>


            <a class="create-button d-flex justify-content-center align-items-center" href="{{ url("/admin/products/create") }}">
                Create Proudct
            </a>

    </div>


    <table class="table table-dark container">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Category</th>
        <th scope="col">Product Name</th>
        <th scope="col">Description</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        <th scope="col">Created At</th>
    </tr>
    </thead>
    @foreach($proudcts as $proudct)
        <tbody>
        <tr>
            <th scope="row">{{$proudct->id}}</th>
            <th scope="row">
                @if($proudct->categories_id == 1)
                    <p>Hoodies</p>
                @elseif($proudct->categories_id == 2)
                    <p>Pants</p>
                @endif

            </th>
            <td><a href="{{ url("/admin/products/$proudct->id") }}">{{$proudct->product_name}}</a></td>
            <td scope="row">{{$proudct->description}}</td>


            <td>
                <form  action="{{url("/admin/products/$proudct->id")}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button value="delete" type="submit" class="btn btn-light rounded-circle">
                        <img src="/refresh-page-option.png " width="20" height="20">
                    </button>
                </form>
            </td>


            <td>
                <form  action="{{url("/admin/products/$proudct->id")}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button value="delete" type="submit" class="btn btn-danger rounded-circle">
                        <img src="/delete.png " width="20" height="20">
                    </button>
                </form>
            </td>

            <td>{{$proudct->created_at}}</td>
        </tr>
        </tbody>
    @endforeach
</table>
</div>
@endsection
@endauth
