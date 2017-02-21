@extends('../layouts.single')

@section('content')
    <div class="container">
        <div class="panel panel-default" style="margin-top: 75px;">
            <div class="panel-heading">{{$homework->name}}</div>
            <div class="panel-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p>{{$homework->description}}</p>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><b>Deadline: {{$homework->deadline}}</b></li>
                @if($homework->attachment != 'no attachment')
                    <li class="list-group-item"><b>Attachment: <a href="{{url('bimlab/public') .  '/' . $homework->attachment }}">Link</a></b></li>
                @endif
                <h4 class="text-center">Student homework:</h4>
                @foreach($students as $student)
                    <li class="list-group-item">
                        <span>
                            {{ BIM\User::getFullName($student->user_id) }}
                        </span>
                        <span style="float: right;">
                            <a href="{{ url('/bimlab/public') . $student->attachment }}">
                                View
                            </a>
                        </span>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
@endsection
