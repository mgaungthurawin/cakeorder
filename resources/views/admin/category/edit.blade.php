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
               <div class="row">
                   {!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'patch']) !!}

                        @include('admin.category.fields')

                        <div class="form-group col-sm-6">
                                {!! Form::label('parent', 'Parent') !!}
                            <select id="parent" name="parent" class="form-control">
                                    <option value="0"></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('category.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection