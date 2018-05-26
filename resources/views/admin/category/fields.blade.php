<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="text-danger">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>