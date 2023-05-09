@auth()

@extends ('layout')

@section('title')
    Add Category
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-3">Create new</h1>

        <form action="{{url('/admin/categories')}}" method="post">
            @csrf
            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Category</span>
                </div>
                <input name="category" type="text" class="form-control acc-style">
            </div>
            <input type="submit" value="Add a new Category" class="btn create-button  mt-3 text-capitalize">
        </form>
    </div>

@endsection
@endauth
