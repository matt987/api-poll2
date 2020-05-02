










<li class="{{ Request::is('polls*') ? 'active' : '' }}">
    <a href="{{ route('polls.index') }}"><i class="fa fa-edit"></i><span>Polls</span></a>
</li>

<li class="{{ Request::is('questions*') ? 'active' : '' }}">
    <a href="{{ route('questions.index') }}"><i class="fa fa-edit"></i><span>Questions</span></a>
</li>

<li class="{{ Request::is('responses*') ? 'active' : '' }}">
    <a href="{{ route('responses.index') }}"><i class="fa fa-edit"></i><span>Responses</span></a>
</li>

