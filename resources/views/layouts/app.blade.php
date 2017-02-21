<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIM Training Studio</title>
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="http://bimtrainingstudio.com">
                    <div class="logo-spot"></div>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a href="{{ url('/') }}">Home</a></li>
                    @endif

                @if(Auth::check() && Auth::user()->status == 1)
                        @if(!\BIM\Enrollment::isEnrolled(Auth::user()->id))
                                @if(Auth::user()->teacher != 1)
                                    <li><a href="{{ url('/apply-for-course') }}">Apply for course</a></li>
                                @endif
                        @else
                                <li class="dropdown">
                                    <a href="#" type="button" id="coursesMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Courses
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="coursesMenu">
                                        <li><a href="{{ url('/my-courses') }}">My Courses</a></li>
                                        <li><a href="{{ url('/apply-for-course') }}">Apply for course</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{ url('/schedule') }}">Schedule</a></li>
                                {{--<li><a href="{{ url('/material') }}">Material</a></li>--}}
                                {{--<li><a href="{{ url('/homework') }}">Homework</a></li>--}}
                        @endif
                            @if(Auth::user()->teacher == 1 && Auth::user()->status == 1)
                                <li class="dropdown">
                                    <a href="#" type="button" id="teacherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Teacher
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="teacherMenu">
                                        <li><a href="{{ url('/teacher/courses') }}">My Courses</a></li>
                                    </ul>
                                </li>
                            @endif
                            @if(Auth::user()->admin == 1)
                                <li class="dropdown">
                                    <a href="#" type="button" id="adminMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Admin
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="adminMenu">
                                        <li><a href="{{ url('/admin/announcements') }}">Announcements</a></li>
                                        <li><a href="{{ url('/admin/send-email') }}">Send emails</a></li>
                                        <li><a href="{{ url('/admin/list-of-students') }}">List of students</a></li>
                                        <li><a href="{{ url('/admin/course-applications') }}">Courses applications</a></li>
                                        {{--<li role="separator" class="divider"></li>--}}
                                        <li><a href="{{ url('/admin/courses') }}">Courses</a></li>
                                        <li><a href="{{ url('/admin/teacher-applications') }}">Teacher applications</a></li>
                                    </ul>
                                </li>
                            @endif
                    @endif

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#reportBug">
                            Bug report
                        </a>
                    </li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user()->status == 1)
                                    <li><a href="{{ url('/settings') }}"><i class="fa fa-btn fa-cogs"></i>Settings</a></li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class=" general-layout-container">
        @yield('content')
    </div>
</body>

<footer class="col-md-12 footer">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-6">
            <ul class="bottom-menu">
                <li><a href="http://bimtrainingstudio.com/#contact&"><h4>Get in touch</h4></a></li>
                <li><a href="http://bimtrainingstudio.com/#project"><h4>About BIM training studio</h4></a></li>
                <li style="    display: flex;
    border-bottom: none;
    padding: 20px 20px 20px 0px;">

                    <div class="col-md-6 icon-spot">
                        <a href="https://www.facebook.com/BIMTrainingStudio/?fref=ts"><img src="/images/icons/facebook.png"></a>
                    </div>

                    <div class="col-md-6 icon-spot">
                        <a href="http://www.bimtrainingstudio.com"><img src="/images/icons/home.png"></a>
                    </div>

                  {{--  <div class="col-md-4 icon-spot">
                        <a href="#"><img src="/images/icons/mail.png"></a>
                    </div>--}}

                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 bot-logo-spot"><img src="/images/Logo_White_noframe.png"></div>

            <div class="icon-area col-md-12">

            </div>

        </div>
    </div>
    {{--<div class="col-md-12 depa-zone">--}}
        {{--<p>Solution:       <a href="https://depamatic.com" target="_blank"><img src="/images/depa-logo.png"></a></p>--}}
    {{--</div>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
    <script type="text/javascript">

        $(window).load(function(){
            $('#missingRevit').modal('show');
            $('#missingInventor').modal('show');

            $('#missingRevitApplication').modal('show');
            $('#missingInventorApplication').modal('show');
            $('#missingAutoCADApplication').modal('show');
            $('#missingFusion360Application').modal('show');
            $('#missingBIMFocusApplication').modal('show');
            $('#missingRobotApplication').modal('show');
        });
        $('#selectAll').change(function() {
            var checkboxes = $(this).closest('form').find(':checkbox');
            if($(this).is(':checked')) {
                checkboxes.prop('checked', true);
            } else {
                checkboxes.prop('checked', false);
            }
        });
    </script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea#tinyMCE' });</script>
</footer>

<div class="modal fade" id="reportBug" tabindex="-1" role="dialog" aria-labelledby="reportBug">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/report-bug') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Report bug on website</h4>
                </div>
                <div class="modal-body">
                    <p>
                        Describe how you got error on website detailed (i.e. include which actions you was taking before you received error, what browser you are using etc.)
                        Please as much detailed as you can
                    </p>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    <input type="file" name="attachment" id="attachment">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
</html>