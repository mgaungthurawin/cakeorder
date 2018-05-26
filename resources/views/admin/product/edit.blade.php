@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'patch', 'files' => 'true']) !!}

                        <div class="form-group col-sm-6">
                                {!! Form::label('category_id', 'Category') !!}
                            <select id="category_id" name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 

                                        @if(in_array($category->id, $selected))
                                            selected
                                        @endif

                                        >{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        @include('admin.product.fields')

                        <img src="{{url($product->image)}}" width="20%">
                        <div class="form-group col-sm-6">
                            {!! Form::label('image', 'Image:') !!} <span class="text-danger">*</span>
                            {!! Form::file('image', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('image'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" name="img" value="{{$product->image}}">
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('product.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection