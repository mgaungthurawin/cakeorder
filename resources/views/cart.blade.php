@extends('layouts.app')
@section('content')

    @include('layouts.head')

    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="sec-title p-b-52">
                <h3 class="m-text5 t-center">
                    Your Cart Items
                </h3>
            </div>

            <div class="row">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach(Cart::content() as $cart)
                            <tr>
                                <td>{{$cart->name}}</td>
                                <td>{{$cart->price}}</td>
                                <td>{{$cart->qty}}</td>
                                <td>
                                    <div id="rowid" style="display:none;">{{$cart->rowId}}</div>
                                    <div id="product_id" style="display:none;">{{$cart->id}}</div>
                                    <button class="btn btn-primary" id="removecart">Remove</button>
                                </th>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>
                                    {{Cart::subtotal()}}
                                    <br/><br/>
                                    <a href="{{ url('/cartorder') }}" class="btn btn-primary">Order</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @include('sweet::alert')
@endsection




