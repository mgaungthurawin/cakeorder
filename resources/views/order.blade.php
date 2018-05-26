@extends('layouts.app')
@section('content')
<section class="blog bgwhite p-t-94 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                        
                    </a>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <div class="block3-txt p-t-14">
                        
                    <form class="leave-comment" method="post" action="{{route('cakeorder')}}">
                        {{csrf_field()}}
                        <div>
                            <div class="bo4 of-hidden size15 m-b-20">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="name" name="name" placeholder="Enter Contact Name">
                            </div>
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="phone" name="phone" placeholder="Enter Msisdn">
                        </div>

                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="Enter Send Address"></textarea>
                        <div class="">
                            <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Submit
                            </button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
               
            </div>

        </div>
    </div>
</section>
@endsection


