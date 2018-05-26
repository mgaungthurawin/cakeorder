@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            product
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">

                    <div class="form-group col-sm-6">
                        {!! Form::label('category', 'Category:') !!}
                        <p>{{$product->categories[0]->name}}</p>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('title', 'Title:') !!}
                        <p>{!! $product->title !!}</p>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('price', 'Price:') !!}
                        <p>{!! $product->price !!}</p>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('stock', 'Stock:') !!}
                        <p>{!! $product->stock !!}</p>
                    </div>

                    <div class="form-group col-sm-12">
                        <img src="{{url($product->image)}}">
                    </div>

                    <a href="{!! route('product.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection