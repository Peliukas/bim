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
    <br>
    <br>
    @if(isset($homework))
        @if(count($homework) == 0)
            <h3>No homework!</h3>
        @endif
        @foreach($homework as $h)
            <a href="{{ url('homework') . '-' . $h->id}}" class="list-group-item">
                <i class="fa fa-tasks" aria-hidden="true"></i>
                <b>{{$h->name}}</b>
                <i style="float: right;">Deadline: {{$h->deadline}}</i><br>
            </a>
        @endforeach
    @endif
</div>
</body>
</html>
