@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="row">
            <form method="GET">
                <div class="form-group col-md-3">
                    <input type="text" name="phone" class="form-control">
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

                @if (count($customers) == 0)
                    <div class="form">
                        <h4 class="checkbox">
                        <center>
                            Customer Not found</h4>
                        </center>
                    </div>
                @else
                    @include('admin.customer.table')
                @endif
            </div>
            <div class="pull-right">{{ $customers->render() }}</div>
        </div>
    </div>
@endsection