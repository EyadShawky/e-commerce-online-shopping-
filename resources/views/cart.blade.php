@extends('userLayout')

@section('title')
    Cart
@endsection


@section('content')
    <table id="cart" class="table container table-hover">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Total/Product</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
           <tbody>
           @php $total = 0 @endphp
           @if(session('cart'))
               @foreach(session('cart') as $id => $details)
                   @php $total += $details['price'] * $details['quantity'] @endphp
                   <tr data-id="{{ $id }}">
                       <td data-th="Product">
                           <div class="row">
                               <div class="col-sm-3 hidden-xs"><img src="{{ asset($details['img']) }}" width="60" height="60" class="img-responsive"/></div>
                               <div class="col-sm-9 ">
                                   <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                               </div>
                           </div>
                       </td>
                       <td data-th="Price">${{ $details['price'] }}</td>
                       <td class="text-center">{{ $details['quantity'] }}</td>

                       <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                       <td class="actions" data-th="">
                           <form action="{{url("/cart/delete/$id")}}" method="POST" >
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-remove">Remove</button>
                           </form>

                       </td>
                   </tr>
               @endforeach
           @endif
           </tbody>
        <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="8" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-shop"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection

