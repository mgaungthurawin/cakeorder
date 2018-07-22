@extends('layouts.app')

@section('content')

    @include('layouts.head')
    
    @include('layouts.slide')

    <!-- Blog -->
    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="sec-title p-b-52">
                <h3 class="m-text5 t-center">
                    About Us
                </h3>
            </div>

            <div class="row">

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="#" class="block3-img dis-block hov-img-zoom">
                            <img src="{{url('images/mihanni.jpg')}}" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    Founder of Online Cake order System
                                </a>
                            </h4>

                            <span class="s-text6">By</span> <span class="s-text7">Nyo Lay Htike</span>
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
                            <img src="{{url('images/cake.jpg')}}" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    Many Cake are available on our shop
                                </a>
                            </h4>

                            <p class="s-text8 p-t-16">
                                Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
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









