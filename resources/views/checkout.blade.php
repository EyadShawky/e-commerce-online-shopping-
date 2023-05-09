@extends('userLayout')

@section('title')
    Checkout
@endsection


@section('content')
    <div class="container">
        <h1>Checkout</h1>

        @if (session()->has('order'))
            <h2>Order Summary:</h2>
            <ul>
                <li>Customer Name: {{ $order->customer_name }}</li>
                <li>Customer Email: {{ $order->customer_email }}</li>
            </ul>
        @endif
    </div>

@endsection
