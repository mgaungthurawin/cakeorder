@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="{!! route('category.create') !!}">Add New</a>
        </h1>
        <div class="row">
            <!-- <div class="pull-left">
                <form method="GET">
                    <div class="form-group col-md-8">
                        <input type="text" name="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div> -->
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.category.table')
            </div>
            <div class="pull-right">{{ $categories->render() }}</div>
        </div>
    </div>
@endsection