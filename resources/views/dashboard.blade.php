@extends('layouts.app')
@section('content')

    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="sec-title p-b-52">
                <h3 class="m-text5 t-center">
                    Your Orders Items
                </h3>
            </div>

            <div class="row">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Order</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($order as $o)
                            <tr>
                                <td>{{$o->title}}</td>
                                <td>{{$o->price}}</td>
                                <td>{{$o->stock}}</td>
                                <td>
                                @if($o->order_status == 0)
                                    to deliver
                                @else
                                    Deliveried
                                @endif
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection




