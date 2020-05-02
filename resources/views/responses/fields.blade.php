<!-- Response Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response', 'Response:') !!}
    {!! Form::text('response', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Poll Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poll_id', 'Poll Id:') !!}
    {!! Form::number('poll_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('responses.index') }}" class="btn btn-default">Cancel</a>
</div>
