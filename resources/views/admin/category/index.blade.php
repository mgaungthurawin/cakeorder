@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="{!! route('category.create') !!}">Add New</a>
        </h1>
        <div class="row">
            <form method="GET">
                <div class="form-group col-md-3">
                    <input type="text" name="name" class="form-control">
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
                @if (count($categories) == 0)
                    <div class="form">
                        <h4 class="checkbox">
                        <center>
                            Category Not found</h4>
                        </center>
                    </div>
                @else
                    @include('admin.category.table')
                @endif

            </div>
            <div class="pull-right">{{ $categories->render() }}</div>
        </div>
    </div>
@endsection