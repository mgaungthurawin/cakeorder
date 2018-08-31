@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="row">
            <form method="GET">
                <div class="form-group col-md-3">
                    <input type="text" name="order_id" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                @if (count($orders) == 0)
                    <div class="form">
                        <h4 class="checkbox">
                        <center>
                            Order Not found</h4>
                        </center>
                    </div>
                @else
                    @include('admin.order.table')
                @endif
            </div>
            <div class="pull-right">{{ $orders->render() }}</div>
        </div>
    </div>
@endsection