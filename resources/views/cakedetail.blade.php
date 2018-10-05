@extends('layouts.app')
@section('content')
    @include('layouts.head')
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/spinner.css')}}">
    <!-- Blog -->
    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="#" class="block3-img dis-block hov-img-zoom">
                            <img src="{{url($product->image)}}" alt="IMG-BLOG">
                        </a>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="#" class="m-text11">
                                    {{$product->title}}
                                </a>
                            </h4>
                            <div>
                                <div class="bo4 of-hidden size15 m-b-20">
                                    <select class="sizefull s-text7 p-l-22 p-r-22" id="product_id" name="product_id">
                                        @foreach($products as $prod)
                                            <option value="{{$prod->id}}">{{$prod->weigh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <span id="cake_weigh" class="s-text6">Weigh - {{ $product->weigh }} </span>
                            <br/>
                            <span id="cake_price" class="s-text6">{{ $product->price }} Ks</span>
                            <br/>
                            {{$product->description}}

                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <div class="block3">
                        <div class="block3-txt p-t-14">
                            <div class="w-size25">
                                <button id="addtocart" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                    Add To cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                    <span id="spanproduct" style="display: none;">{{$product->id}}</span>
                    <input type="hidden" id="title" name="title" value="{{$product->title}}">
                    <input type="hidden" id="price" name="price" value="{{$product->price}}">
                </div>

            </div>
        </div>
    </section>
@endsection







