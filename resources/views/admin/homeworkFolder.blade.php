<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIM LAB</title>
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="apply-for-course-page-title panel-heading">Homework folder - {{ $folder->name }}
    @if($course->id == 2)
        {{ ($folder->groupNo == 1) ? '(Mondays - Wednesdays)' : '(Tuesdays - Thursdays)' }}
    @endif
    @if($course->id == 3)
        {{ ($folder->groupNo == 1) ? '(Beginner)' : '(Advanced)' }}
    @endif
</div>
<div class="col-md-12 single-student-container" style="margin-top: 55px;">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <button class="btn btn-primary" data-toggle="modal" data-target="#newHomework">New homework</button>
    <a href="{{ url('/admin/remove-homework-folder') . '/' . $folder->id }}" style="float: right;" onclick="return confirm('This will delete all homework inside!')">
        <button class="btn btn-danger">
            Delete folder!
        </button>
    </a>
    <br>
    <br>
    @if(isset($homework))
        @if(count($homework) == 0)
            <h3>No homework!</h3>
        @endif
        @foreach($homework as $h)
            <a href="{{ url('review/homework') . '/' . $h->id }}" class="list-group-item">
                <i class="fa fa-tasks" aria-hidden="true"></i>
                <b>{{$h->name}}</b>
                <i style="float: right;">Deadline: {{$h->deadline}}</i><br>
                <a href="{{ url('admin/delete-homework') . '/' . $h->id }}" style="float: right;">Remove</a><br>
            </a>
        @endforeach
    @endif
</div>

<div class="modal fade" id="newHomework" tabindex="-1" role="dialog" aria-labelledby="newHomework">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/add-homework') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add new homework</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="course" value="{{$course->id}}">
                    <input type="hidden" value="{{ $folder->id }}" name="folderHomework">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>


