<div class="table-responsive">
    <table class="table" id="polls-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Description</th>
        <th>Num Questions</th>
        <th>Status</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($polls as $poll)
            <tr>
                <td>{{ $poll->title }}</td>
            <td>{{ $poll->description }}</td>
            <td>{{ $poll->num_questions }}</td>
            @if($poll->status)
              <td>Active</td>
            @else
              <td>Disabled</td>
            @endif
            <td>{{ $poll->status }}</td>
            <td>{{ $poll->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['polls.destroy', $poll->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('polls.show', [$poll->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('polls.edit', [$poll->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{{ route('polls.changeStatus', [$poll->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-refresh"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
