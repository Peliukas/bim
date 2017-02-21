@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">{{$course->name}}</div>
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <h4 style="text-align: center;">{!! $course->description !!}</h4>
                        <div class="col-md-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item disabled small-panel-heading">
                                    Course announcements
                                </a>
                                @foreach($allNews as $news)
                                    <div style="background: #f5f5f5" class="list-group-item">
                                        <h4>{{$news->title}}</h4>
                                        {!! $news->description !!}
                                        <i>Posted: {{$news->created_at}} - By: {{ BIM\User::getFullName($news->user_id) }}</i>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item disabled small-panel-heading">
                                    Assignments
                                </a>
                                @foreach($homeworkFolders as $folder)
                                    @if($course->id == 2)
                                        <a href="{{ url('/course/homework-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i> {{ ($folder->groupNo == 1) ? $folder->name . ' (Mondays - Wednesdays)' : $folder->name . ' (Tuesdays - Thursdays)'}}
                                        </a>
                                    @endif
                                    @if($course->id == 3)
                                        <a href="{{ url('/course/homework-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i> {{ ($folder->groupNo == 1) ? $folder->name . ' (Beginner)' : $folder->name . ' (Advanced)'}}
                                        </a>
                                    @endif
                                    @if($course->id != 3 && $course->id != 2)
                                        <a href="{{ url('/course/homework-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>  {{ $folder->name }}
                                        </a>
                                    @endif
                                @endforeach
                                @foreach($homework as $hw)
                                    <a href="{{ url('/homework') . '-' . $hw->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                        <i class="fa fa-file" aria-hidden="true"></i>  {{ $hw->name }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="list-group">
                                <div class="panel panel-default">
                                    <a href="#" class="list-group-item disabled small-panel-heading">
                                        Course material
                                    </a>
                                    {{--<div class="panel-heading course-material-title-dark">Course material</div>--}}
                                    <div class="panel-body">
                                        @foreach($materialFolders as $folder)
                                            @if($course->id == 2)
                                                <a href="{{ url('/course/material-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                                    <i class="fa fa-folder-open" aria-hidden="true"></i> {{ ($folder->groupNo == 1) ? $folder->name . ' (Mondays - Wednesdays)' : $folder->name . ' (Tuesdays - Thursdays)'}}
                                                </a>
                                            @endif
                                            @if($course->id == 3)
                                                <a href="{{ url('/course/material-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                                    <i class="fa fa-folder-open" aria-hidden="true"></i> {{ ($folder->groupNo == 1) ? $folder->name . ' (Beginner)' : $folder->name . ' (Advanced)'}}
                                                </a>
                                            @endif
                                            @if($course->id != 3 && $course->id != 2)
                                                <a href="{{ url('/course/material-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                                    <i class="fa fa-folder-open" aria-hidden="true"></i>  {{ $folder->name }}
                                                </a>
                                            @endif
                                        @endforeach
                                        @foreach($materials as $m)
                                            <a href="{{ url('bimlab/public') . $m->attachment}}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                                <i class="fa fa-file" aria-hidden="true"></i>  {{ $m->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{--@if(isset($choices))--}}
                                {{--@if($id == 2)--}}
                                    {{--@include('user.partials.revit')--}}
                                {{--@endif--}}
                                {{--@if($id == 3)--}}
                                    {{--@include('user.partials.inventor')--}}
                                {{--@endif--}}
                            {{--@endif--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="list-group">--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<a href="#" class="list-group-item disabled small-panel-heading">--}}
                                            {{--Course material--}}
                                        {{--</a>--}}
                                        {{--<div class="panel-heading course-material-title-dark">Course material</div>--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<ul style="list-style: none;">--}}
                                                {{--@foreach($students as $student)--}}
                                                    {{--<li>{{ $student->name . ' ' . $student->surname }}</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-10 col-md-offset-1">--}}
                {{--<div class="list-group">--}}
                    {{--<div class="list-group-item disabled small-panel-heading">--}}
                        {{--Students on this course--}}
                    {{--</div>--}}
                    {{--<div class="list-group-item">--}}
                        {{--<ul style="list-style: none;">--}}
                            {{--@foreach($students as $student)--}}
                                {{--<li>{{ $student->name . ' ' . $student->surname }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}

        {{--</div>--}}
    </div>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            var courseID = <?php echo json_encode($course->id); ?>;
            $.getJSON( "/hw-percentage-" +courseID, function( percentage ) {
                document.getElementById('HomeworkProgress').style.width = percentage+"%";
            });

        });
    </script>
    </div>
@endsection
