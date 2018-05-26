@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="row">

        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.customer.table')
            </div>
            <div class="pull-right">{{ $customers->render() }}</div>
        </div>
    </div>
@endsection