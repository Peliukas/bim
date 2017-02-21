@extends('../layouts.app')

@section('content')
<div class="panel-heading apply-for-course-page-title">Apply for course</div>
<div class="col-md-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default fullwidth-course-table">
                    <div class="panel-body">

                        <table class="table fullwidth-course-table" style="text-align: center;">
                            <tr>
                                <td><b>Course name</b></td>
                                <td><b>Action</b></td>
                            </tr>
                            @foreach($courses as $course)
                                @if(!\BIM\Enrollment::inCourse(Auth::user()->id, $course->id))
                                    <tr>
                                        <td>{{ $course->name}}</td>
                                        <td>
                                            <a href="{{ url('/apply-for-course') .'/' . $course->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                                <button class="btn btn-primary apply-for-course-btn">Apply for course</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection