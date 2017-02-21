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
<div class="apply-for-course-page-title panel-heading">
    {{ $course->name }} info update
</div>
<div class="col-md-12 single-student-container" style="margin-top: 55px;">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/course/update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="course" value="{{ $course->id }}">
        <label for="name">Course name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}">
        <br>
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" style="height: 180px;">{{ $course->description }}</textarea>
        <br>
        <label for="course_length">Course length</label>
        <input type="text" name="course_length" id="course_length" class="form-control" value="{{ $course->course_length }}">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>


