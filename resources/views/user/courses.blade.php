@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">Your active courses</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body">
                        <table class="table course-list-table" style="text-align: center;">
                            <tr>

                                <td><b>Course name</b></td>
                                {{--<td><b>Homework</b></td>--}}
                                <td><b>Action</b></td>
                            </tr>
                            @foreach($courses as $no => $course)
                                <tr>

                                    <td>{{ \BIM\Courses::getCourseName($course->course_id) }}</td>
                                    {{--<td>{{ count(\BIM\Homework::getHomework($course->course_id)) }}</td>--}}
                                    <td>
                                        <a href="{{ url('/course') .'-' . $course->course_id }}">
                                            <button class="btn apply-for-course-btn">View course</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
