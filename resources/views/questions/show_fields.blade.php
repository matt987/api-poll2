<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $question->id }}</p>
</div>

<!-- Question Field -->
<div class="form-group">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $question->question }}</p>
</div>

<!-- Options Field -->
<div class="form-group">
    {!! Form::label('options', 'Options:') !!}
    <p>{{ $question->options }}</p>
</div>

<!-- Display Options Field -->
<div class="form-group">
    {!! Form::label('display_options', 'Display Options:') !!}
    <p>{{ $question->display_options }}</p>
</div>

<!-- Poll Id Field -->
<div class="form-group">
    {!! Form::label('poll_id', 'Poll Id:') !!}
    <p>{{ $question->poll_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $question->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $question->updated_at }}</p>
</div>

