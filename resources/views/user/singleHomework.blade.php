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
                {{--Auth::user()->teacher == 0 && Auth::user()->admin == 0 &&--}}
                 @if($homework->deadline >= date('Y-m-d'))
                    <li class="list-group-item" style="text-align: center;">
                        <b>Your homework:</b>
                        @if(\BIM\HomeworkList::checkHomework($homework->id, Auth::user()->id))
                            <a href="{{ url('bimlab/public' .  '/' .\BIM\HomeworkList::getHomework($homework->id, Auth::user()->id)->attachment) }}">Download</a>
                            <br>
                            <i>{{ \BIM\HomeworkList::getHomework($homework->id, Auth::user()->id)->created_at }}</i>
                        @else
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/homework-upload') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="attachment">
                                <input type="hidden" name="homework" value="{{$homework->id}}">
                                <input type="hidden" name="course" value="{{$homework->course_id}}">
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        @endif
                    </li>
                @else
                    <b></b>
                @endif
            </ul>
        </div>
    </div>
@endsection
