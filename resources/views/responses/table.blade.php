<div class="table-responsive">
    <table class="table" id="responses-table">
        <thead>
            <tr>
                <th>Response</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Poll Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($responses as $response)
            <tr>
                <td>{{ $response->response }}</td>
            <td>{{ $response->latitude }}</td>
            <td>{{ $response->longitude }}</td>
            <td>{{ $response->poll_id }}</td>
                <td>
                    {!! Form::open(['route' => ['responses.destroy', $response->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('responses.show', [$response->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('responses.edit', [$response->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
