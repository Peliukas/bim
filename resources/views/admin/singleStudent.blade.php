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
        <div class="apply-for-course-page-title panel-heading">Info on user ID {{$id}}</div>
        <div class="col-md-12 single-student-container">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <label>Name: </label>
            {{$name}}<br>
            <label>Surname:</label>
            {{$surname}}<br>
            <label>Email:</label>
            {{$email}}<br>
            <label>Student ID:</label>
            {{$student_id}}<br>
            <label>Phone:</label>
            {{$phone}}<br>
            <label>Created on:</label>
            {{$created_at}}<br>
            <label>Date of birth:</label>
            {{$birthday}}<br>
            <label>Gender: </label>
            {{$gender}}<br>
            <label>Country:</label>
            {{$country}}<br>
            <label>Languages: </label>
            {{$languages}}<br>
            <label>Study program: </label>
            {{$study_programm}}<br>
            <label>Semester: </label>
            {{$semester}}<br>
            <label>Is fulltime: </label>
            @if($fulltime)
                Yes
            @else
                No
            @endif
            <br>
            <h3>Send email</h3>
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/admin/send-student-email') }}">
                {{ csrf_field() }}
                <input type="hidden" name="user" value="{{ $id }}">
                <input type="text" name="aboutWhat" placeholder="Subject" class="form-control">
                <br>
                <textarea name="aboutWho" class="form-control"></textarea>
                <br>
                <button class="btn btn-success" type="submit">Send</button>
            </form>
            <hr>
            <h3>Course applications</h3>
            <hr>
            @foreach($enrollments as $enrollment)
                @if(file_exists(public_path('profile' . '/' . $enrollment->student_id . '/' . \BIM\Courses::getSlug($enrollment->course_id) . '-info.json')))
                <h4>{{ \BIM\Courses::getCourseName($enrollment->course_id) }}</h4>
                <br>
                <a href="{{ url('/admin/view-student-course-info') . '/' . $enrollment->id }}">
                    <button type="button" class="btn btn-primary">Review</button>
                </a>
                <hr>
                @else
                    <h4>{{ \BIM\Courses::getCourseName($enrollment->course_id) }}</h4>
                    <br>
                    Student has not filled his application!
                    <hr>
                @endif
            @endforeach
        </div>
    </body>
</html>
