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

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

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
                </div>
            </div>

        </div>
    </section>


    <!-- Blog -->
    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="sec-title p-b-52">
                <h3 class="m-text5 t-center">
                    Our Blog
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="{{url('images/panei.jpg')}}" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    Black Friday Guide: Best Sales & Discount Codes
                                </a>
                            </h4>

                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>

                            <p class="s-text8 p-t-16">
                                Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="{{url('images/mihanni.jpg')}}" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    The White Sneakers Nearly Every Fashion Girls Own
                                </a>
                            </h4>

                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 18, 2017</span>

                            <p class="s-text8 p-t-16">
                                Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="{{url('images/mihanni.jpg')}}" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    New York SS 2018 Street Style: Annina Mislin
                                </a>
                            </h4>

                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 2, 2017</span>

                            <p class="s-text8 p-t-16">
                                Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed hendrerit ligula porttitor. Fusce sit amet maximus nunc
                            </p>
                        </div>
                    </div>
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

                <a href="#" class="s-text11 t-center">
                    Click here for more info
                </a>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    30 Days Return
                </h4>

                <span class="s-text11 t-center">
                    Simply return it within 30 days for an exchange.
                </span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Store Opening
                </h4>

                <span class="s-text11 t-center">
                    Shop open from Monday to Sunday
                </span>
            </div>
        </div>
    </section>
@include('layouts.footer')
@endsection









