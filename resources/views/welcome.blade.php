@extends('layouts.app')

@section('content')

    @include('layouts.head')
    
    @include('layouts.slide')

    <!-- New Product -->
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">

            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Featured Products
                </h3>
            </div>

            <form class="leave-comment" method="GET">
                <div class="sec-title p-b-60">
                    <h3 class="m-text5">
                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="name" name="name" placeholder="Enter Cake Name">
                    </div>
                    </h3>
                </div>
            </form>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                    @if (count($products) == 0)
                        <div class="form">
                            <h4 class="checkbox">
                            <center>
                                Product Not found</h4>
                            </center>
                            <br/>
                            <a href="{{ url('/') }}" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-3">
                                Back
                            </a>
                        </div>
                    @else
                        @foreach($products as $product)
                            <div class="item-slick2 p-l-15 p-r-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                        @if($product->stock > 0)
                                            <a href="{{url('/cake/'.$product->id)}}">
                                                <img src="{{url($product->image)}}" alt="IMG-PRODUCT">
                                            </a>
                                        @else
                                            <img src="{{url($product->image)}}" alt="IMG-PRODUCT">
                                        @endif
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        @if($product->stock > 0)
                                        <a href="{{url('/cake/'.$product->id)}}" class="block2-name dis-block s-text3 p-b-5">
                                            {{$product->title}}
                                        </a>
                                        @else
                                            {{$product->title}}
                                        @endif

                                        <span class="block2-price p-r-5">
                                        Stock {{$product->stock}}
                                        </span>
                                        <br>
                                        <span class="block2-price p-r-5">
                                            {{$product->price}} Ks
                                        </span>
                                        @if($product->stock == 0)
                                            <br>
                                            <span class="block2-price p-r-5">
                                                Out of stock
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </section>

    <!-- Shipping -->
    <section class="shipping bgwhite p-t-62 p-b-46">
        <div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Free Delivery Myanmar
                </h4>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    Shop Opening
                </h4>

                <span class="s-text11 t-center">
                    Shop Open 9:00 AM
                </span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Store Close
                </h4>

                <span class="s-text11 t-center">
                    Shop close 7:00 PM
                </span>
            </div>
        </div>
    </section>
@include('layouts.footer')
@endsection









