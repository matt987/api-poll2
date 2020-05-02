<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Options Field -->
<div class="form-group col-sm-6">
    {!! Form::label('options', 'Options:') !!}
    {!! Form::text('options', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Options Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_options', 'Display Options:') !!}
    {!! Form::select('display_options', ['Select' => 'Select', 'button' => 'button'], null, ['class' => 'form-control']) !!}
</div>

<!-- Poll Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poll_id', 'Poll Id:') !!}
    {!! Form::number('poll_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('questions.index') }}" class="btn btn-default">Cancel</a>
</div>
