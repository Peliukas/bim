@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">{{$course->name}}</div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

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
                        {{--<h4 class="text-center">{{$course->description}}</h4>--}}
                        <button class="btn btn-primary" data-toggle="modal" data-target="#newEmail">Send email</button>
                        <button class="btn btn-default" data-toggle="modal" data-target="#addNews">Post announcement</button>
                        <hr>
                        <div class="col-md-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item disabled small-panel-heading">
                                    Course announcements
                                </a>
                                @foreach($allNews as $news)
                                    {{ $news->title }}
                                    <a href="{{ url('/teacher/remove-course-news') . '/' . $news->id }}" onclick="return confirm('Are you sure?')" style="float: right;">Remove</a>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="list-group">
                                <a href="#" class="list-group-item disabled small-panel-heading">
                                    Schedule
                                </a>
                                @foreach($schedule as $s)
                                    <a href="#" class="list-group-item">
                                        <b>{{$s->name}}</b>
                                        <br>
                                        {{$s->when}} {{$s->whenTime}}
                                        <br>
                                        <i>{{$s->place}}</i>
                                        <a href="{{ url('/teacher/delete-schedule') . '/' . $s->id }}" style="float: right;">Remove</a><br>
                                    </a>
                                @endforeach
                            </div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#newSchedule">Add new</button>
                        </div>
                        <div class="col-md-6">
                            <div class="list-group">
                                <a href="#" class="list-group-item disabled small-panel-heading">
                                    Homework
                                </a>
                                @foreach(BIM\HomeworkFolders::where('course_id', '=', $course->id)->get() as $folder)
                                    @if($course->id == 2)
                                        <a href="{{ url('/teacher/homework-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i> {{ ($folder->groupNo == 1) ? $folder->name . ' (Mondays - Wednesdays)' : $folder->name . ' (Tuesdays - Thursdays)'}}
                                        </a>
                                    @endif
                                    @if($course->id == 3)
                                        <a href="{{ url('/teacher/homework-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i> {{ ($folder->groupNo == 1) ? $folder->name . ' (Beginner)' : $folder->name . ' (Advanced)'}}
                                        </a>
                                    @endif
                                    @if($course->id != 3 && $course->id != 2)
                                        <a href="{{ url('/teacher/homework-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>  {{ $folder->name }}
                                        </a>
                                    @endif
                                @endforeach
                                @foreach($homework as $hw)
                                    <a href="{{ url('/homework') . '-' . $hw->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                        <i class="fa fa-file" aria-hidden="true"></i>  {{ $hw->name }}
                                        <a href="{{ url('/teacher/delete-homework') . '/' . $hw->id }}" style="float: right">Remove</a>
                                    </a>
                                @endforeach
                            </div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#newHomework">Add new</button>
                            <button class="btn btn-default" data-toggle="modal" data-target="#createFolderHomework">Create folder</button>
                        </div>
                        <hr>
                        <div class="col-md-6" style="padding: 15px;">
                            <div class="list-group">
                                <a href="#" class="list-group-item disabled small-panel-heading">
                                    Course material
                                </a>
                                @foreach(BIM\MaterialFolders::where('course_id', '=', $course->id)->get() as $folder)
                                    @if($course->id == 2)
                                        <a href="{{ url('/teacher/material-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i> {{ ($folder->groupNo == 1) ? $folder->name . ' (Mondays - Wednesdays)' : $folder->name . ' (Tuesdays - Thursdays)'}}
                                        </a>
                                    @endif
                                    @if($course->id == 3)
                                        <a href="{{ url('/teacher/material-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i> {{ ($folder->groupNo == 1) ? $folder->name . ' (Beginner)' : $folder->name . ' (Advanced)'}}
                                        </a>
                                    @endif
                                    @if($course->id != 3 && $course->id != 2)
                                        <a href="{{ url('/teacher/material-folder') . '/' . $folder->id }}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>  {{ $folder->name }}
                                        </a>
                                    @endif
                                @endforeach
                                @foreach($materials as $m)
                                    <a href="{{ url('bimlab/public') . $m->attachment}}" class="list-group-item"  onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                        <i class="fa fa-file" aria-hidden="true"></i>  {{ $m->title }}
                                    </a>
                                    <a href="{{ url('/teacher/delete-material') . '/' . $m->id }}" style="float: right">Remove</a>
                                @endforeach

                            </div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#newMaterial">Add new</button>
                            <button class="btn btn-default" data-toggle="modal" data-target="#createFolderMaterial">Create folder</button>
                        </div>
                        {{--@if(isset($revit))--}}
                            {{--@include('teacher.partials.revit')--}}
                        {{--@endif--}}
                        {{--@if(isset($inventor))--}}
                            {{--@include('teacher.partials.inventor')--}}
                        {{--@endif--}}
                        {{--@if(isset($else))--}}
                            {{--@include('teacher.partials.else')--}}
                        {{--@endif--}}
                        <div class="col-md-12" style="padding: 15px;">
                            <div class="list-group">
                                <a href="#" class="list-group-item disabled small-panel-heading">
                                    Students waiting for approval
                                </a>
                                @foreach($users_waiting as $w)
                                    <div  class="list-group-item" target="_blank">
                                        <a href="{{ url('/teacher/view-student') . '/' . $w->student_id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            {{\BIM\User::getName($w->student_id) . ' ' . \BIM\User::getSurname($w->student_id)}}
                                        </a>

                                        <a href="{{ url('/teacher/approve-to-course') . '/' . $w->id }} ">
                                            <button type="button" class="btn btn-success" style="float: right;">Approve</button>
                                        </a>
                                        <a href="{{ url('/teacher/reject') . '/' . $w->id }} ">
                                            <button type="button" class="btn btn-danger" style="float: right;" onclick="return confirm('Are you sure?')">Reject</button>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newSchedule" tabindex="-1" role="dialog" aria-labelledby="newSchedule">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/add-schedule') }}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add into schedule</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course" value="{{$course->id}}">
                        <label for="scheduleName">Name</label>
                        <input type="text" name="name" id="scheduleName" class="form-control">
                        <label for="schedulePlace">Place</label>
                        <input type="text" name="place" id="schedulePlace" class="form-control">
                        <label for="scheduleDate">Date</label>
                        <input type="date" name="date" id="scheduleDate" class="form-control">
                        <label for="scheduleTime">Time</label>
                        <input type="text" name="time" id="scheduleTime" class="form-control">
                        @if($course->id == 2)
                            <label for="group">Group</label><br>
                            Mon-Wed<input type="radio" id="group" name="group" value="mon-we">
                            Tue-Thur<input type="radio" id="group" name="group" value="tue-thur">
                        @endif

                        @if($course->id == 3)
                            <label for="group">Group</label><br>
                            Beginner<input type="radio" id="group" name="group" value="beginner">
                            Advanced<input type="radio" id="group" name="group" value="advanced">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newHomework" tabindex="-1" role="dialog" aria-labelledby="newHomework">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/add-homework') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add new homework</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course" value="{{$course->id}}">
                        <label for="homeworkGroup">Folder</label>
                        <select id="folderHomework" name="folderHomework" class="form-control">
                            <option selected="selected" value="NULL">- NO FOLDER -</option>
                            @foreach(BIM\HomeworkFolders::where('course_id', '=', $course->id)->get() as $list)
                                @if($course->id == 2)
                                    <option name="{{ $list->id }}" value="{{ $list->id }}"> {{ ($list->groupNo == 1) ? $list->name . ' (Mondays - Wednesdays)' : $list->name . ' (Tuesdays - Thursdays)'}}</option>
                                @endif
                                @if($course->id == 3)
                                        <option name="{{ $list->id }}" value="{{ $list->id }}"> {{ ($list->groupNo == 1) ? $list->name . ' (Beginner)' : $list->name . ' (Advanced)'}}</option>
                                @endif
                                @if($course->id != 3 && $course->id != 2)
                                        <option name="{{ $list->id }}" value="{{ $list->id }}"> {{ $list->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="homeworkName">Name</label>
                        <input type="text" name="name" id="homeworkName" class="form-control">
                        <label for="homeworkDescription">Description</label>
                        <textarea name="description" id="homeworkDescription" class="form-control"></textarea>
                        <label for="homeworkAttachment">Attachment</label>
                        <input type="file" name="attachment" id="homeworkAttachment" class="form-control">
                        <label for="scheduleDeadline">Deadline</label>
                        <input type="date" name="deadline" id="scheduleDeadline" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newMaterial" tabindex="-1" role="dialog" aria-labelledby="newMaterial">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/add-material') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add new material</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course" value="{{$course->id}}">
                        <label for="homeworkGroup">Folder</label>
                        <select id="folderHomework" name="folderHomework" class="form-control">
                            <option selected="selected" value="NULL">- NO FOLDER -</option>
                            @foreach(BIM\MaterialFolders::where('course_id', '=', $course->id)->get() as $list)
                                @if($course->id == 2)
                                    <option name="{{ $list->id }}" value="{{ $list->id }}"> {{ ($list->groupNo == 1) ? $list->name . ' (Mondays - Wednesdays)' : $list->name . ' (Tuesdays - Thursdays)'}}</option>
                                @endif
                                @if($course->id == 3)
                                    <option name="{{ $list->id }}" value="{{ $list->id }}"> {{ ($list->groupNo == 1) ? $list->name . ' (Beginner)' : $list->name . ' (Advanced)'}}</option>
                                @endif
                                @if($course->id != 3 && $course->id != 2)
                                    <option name="{{ $list->id }}" value="{{ $list->id }}"> {{ $list->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="materialTitle">Title</label>
                        <input type="text" name="materialTitle" id="materialTitle" class="form-control">
                        <label for="materialDescription">Description</label>
                        <textarea name="materialDescription" id="materialDescription" class="form-control"></textarea>
                        <label for="materialAttachment">Attachment</label>
                        <input type="file" name="materialAttachment" id="materialAttachment" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="newEnrollment" tabindex="-1" role="dialog" aria-labelledby="newEnrollemnt">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/add-enrollment') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Enroll To Course</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="enrollment" value="{{$course->id}}">
                        <label for="materialDescription">Description</label>
                        <textarea name="materialDescription" id="materialDescription" class="form-control"></textarea>
                        <label for="materialAttachment">Attachment</label>
                        <input type="file" name="materialAttachment" id="materialAttachment" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newEmail" tabindex="-1" role="dialog" aria-labelledby="newEmail">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/send-email-course') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Send email to all students in course</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="enrollment" value="{{$course->id}}">
                        <label for="aboutWhat">Subject</label>
                        <input type="text" name="aboutWhat" id="aboutWhat" class="form-control">
                        <label for="aboutWho">Text</label>
                        <textarea name="aboutWho" id="aboutWho" class="form-control"></textarea>
                        <input type="file" name="attachment" id="attachment">
                        @if($course->id == 2)
                            <label for="group">Group</label><br>
                            Mon-Wed<input type="radio" id="group" name="group" value="mon-we">
                            Tue-Thur<input type="radio" id="group" name="group" value="tue-thur">
                        @endif

                        @if($course->id == 3)
                            <label for="group">Group</label><br>
                            Beginner<input type="radio" id="group" name="group" value="beginner">
                            Advanced<input type="radio" id="group" name="group" value="advanced">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="addNews">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/add-news') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add new announcement</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <label for="newsTitle">Title</label>
                        <input type="text" name="newsTitle" id="newsTitle" class="form-control">
                        <label for="newsText">Text</label>
                        <textarea name="newsText" id="tinyMCE" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createFolderHomework" tabindex="-1" role="dialog" aria-labelledby="createFolderHomework">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/create-folder-homework') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create folder for homework</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course" value="{{$course->id}}">
                        <label for="newsTitle">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @if($course->id == 2)
                            <label for="group">Group</label><br>
                            <input type="radio" id="group" name="group" value="mon-we">Mondays - Wednesdays
                            <br>
                            <input type="radio" id="group" name="group" value="tue-thur">Tuesdays - Thursdays
                        @endif

                        @if($course->id == 3)
                            <label for="group">Group</label><br>
                            Beginner<input type="radio" id="group" name="group" value="beginner">
                            <br>
                            Advanced<input type="radio" id="group" name="group" value="advanced">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createFolderMaterial" tabindex="-1" role="dialog" aria-labelledby="createFolderMaterial">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/create-folder-material') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create folder for material</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course" value="{{$course->id}}">
                        <label for="newsTitle">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @if($course->id == 2)
                            <label for="group">Group</label><br>
                            <input type="radio" id="group" name="group" value="mon-we">Mondays - Wednesdays
                            <br>
                            <input type="radio" id="group" name="group" value="tue-thur">Tuesdays - Thursdays
                        @endif

                        @if($course->id == 3)
                            <label for="group">Group</label><br>
                            Beginner<input type="radio" id="group" name="group" value="beginner">
                            <br>
                            Advanced<input type="radio" id="group" name="group" value="advanced">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



