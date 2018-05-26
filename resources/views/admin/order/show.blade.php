@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Order Detail
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class="form-group col-sm-6">
                        {!! Form::label('name', 'Customer Name:') !!}
                        <p>{!! $order->name !!}</p>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('address', 'Customer Address:') !!}
                        <p>{!! $order->address !!}</p>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('phone', 'Customer Phone:') !!}
                        <p>{!! $order->phone !!}</p>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('orderid', 'Order No:') !!}
                        <p>{{$order->order_id}}</p>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('title', 'Title:') !!}
                        <p>{!! $order->title !!}</p>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('price', 'Price:') !!}
                        <p>{!! $order->price !!}</p>
                    </div>

                    <div class="form-group col-sm-12">
                        <img src="{{url($order->image)}}">
                    </div>

                    <a href="{!! route('orderlist.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection