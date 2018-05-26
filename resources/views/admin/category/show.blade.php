@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <!-- Id Field -->
                    <div class="form-group">
                        {!! Form::label('id', 'Id:') !!}
                        <p>{!! $category->id !!}</p>
                    </div>

                    <!-- Pub Name Field -->
                    <div class="form-group">
                        {!! Form::label('name', 'category Name:') !!}
                        <p>{!! $category->name !!}</p>
                    </div>
                    <a href="{!! route('category.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection