@auth()
@extends ('layout')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="container display-right-container">
        <h1 class="mb-3">Add new</h1>

        <form action="{{url('/admin/products')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prodcut Name</span>
                </div>
                <input name="product_name" type="text" aria-label="First name" class="form-control acc-style">
            </div>

            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description</span>
                </div>
                <input name="description" type="text" aria-label="First name" class="form-control acc-style">
            </div>

            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Price</span>
                </div>
                <input name="price" type="number" aria-label="First name" class="form-control acc-style">
            </div>

            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Categories ID</label>
                </div>
                @foreach($categories as $category)
                <div class="form-check form-check-inline ml-3">
                    <input class="form-check-input" type="radio" name="categories_id" value="{{$category->id}}" >
                    <label class="form-check-label" for="inlineRadio1">{{$category->category}}</label>
                </div>
                @endforeach
               
            </div>

            <div class="input-group w-75 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prodcut IMG</span>
                </div>
                <input name="img" type="file" aria-label="First name" class="ml-3 mt-1">
            </div>




            <input type="submit" value="Add a new Product" class="btn create-button  mt-3 text-capitalize">
        </form>
    </div>
@endsection
@endauth
