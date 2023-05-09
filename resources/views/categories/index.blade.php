@auth()
@extends ('layout')
@section('title')
    Categories
@endsection
@section('content')

    <div class="container d-flex justify-content-between mb-5">
        <h3>
            CATEGORIES
        </h3>


        <a class="create-button d-flex justify-content-center align-items-center" href="{{ url("/admin/categories/create") }}">
            Create Category
        </a>

    </div>


    <table class="table table-dark container">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Category</th>
            <th scope="col">Delete</th>
            <th scope="col">Created At</th>

        </tr>
        </thead>
        @foreach($categories as $category)
            <tbody>
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td><a href="{{ url("/admin/categories/$category->id") }}">{{$category->category}}</a></td>
                <td>
                    <form  action="{{url("/admin/categories/$category->id")}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button value="delete" type="submit" class="btn btn-danger rounded-pill">
                            <img src="/delete.png " width="20" height="20">
                        </button>
                    </form>
                </td>
                <td>{{$category->created_at}}</td>

            </tr>
            </tbody>
        @endforeach
    </table>



@endsection
@endauth
