@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">List of courses</div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">

                    <div class="panel-body">

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($courses) == 0)
                            <h3>There are no courses...</h3>
                        @else
                            <br><br>
                            <table class="table table-bordered" style="text-align: center;">
                                <tr>
                                    <td><b>#</b></td>
                                    <td><b>Course name</b></td>
                                    <td><b>Students</b></td>
                                    <td><b>Action</b></td>
                                </tr>
                                @foreach($courses as $index => $course)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$course->name}}</td>
                                        <td>{{ \BIM\Enrollment::totalStudents($course->id) }}</td>
                                        <td>
                                            <a href="{{ url('/teacher/course') . '-' . $course->id }}">
                                                <button type="button" class="btn btn-primary">View</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
