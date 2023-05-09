@auth()
@extends ('layout')


@section('content')
<div class="display-right-container">



    <div class="container d-flex justify-content-between mb-5">
        <h3>
            Customers
        </h3>
    </div>


    <table class="table table-dark container">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Address</th>
        
        <th scope="col">Created At</th>
    </tr>
    </thead>

    @foreach($customers as $customer)
        <tbody>
        <tr>
            <th scope="row">{{$customer->id}}</th>
            <th scope="row">{{$customer->name}}</th>
            <td><a href="{{ url("/admin/accounts/$customer->id") }}">{{$customer->email}}</a></td>
            <td scope="row">
                @if($customer->role_id == 3)
                    <p>User</p>
                @endif
               </td>
            <td>{{$customer->address}}</td>
            <td>{{$customer->created_at}}</td>
        </tr>
        </tbody>
    @endforeach
</table>
</div>
@endsection
@endauth
