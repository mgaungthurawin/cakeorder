<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!} <span class="text-danger">*</span>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    @if ($errors->has('title'))
        <span class="text-danger">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!} <span class="text-danger">*</span>
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
    @if ($errors->has('price'))
        <span class="text-danger">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!} <span class="text-danger">*</span>
    {!! Form::text('stock', null, ['class' => 'form-control']) !!}
    @if ($errors->has('stock'))
        <span class="text-danger">
            <strong>{{ $errors->first('stock') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

