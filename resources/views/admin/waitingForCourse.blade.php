@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">Course applications</div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">

                    <div class="panel-body">
                        @if(session('deleted'))
                            <div class="alert alert-success">
                                {{ session('deleted') }}
                            </div>
                        @endif
                        @if(session('approved'))
                            <div class="alert alert-success">
                                {{ session('approved') }}
                            </div>
                        @endif
                            @if(count($list) > 0)
                        <table class="table table-bordered">
                            <tr>
                                <td class="small-panel-heading"><b>#</b></td>
                                <td class="small-panel-heading"><b>Name</b></td>
                                <td class="small-panel-heading"><b>Surname</b></td>
                                <td class="small-panel-heading"><b>Course</b></td>
                                <td class="small-panel-heading"><b>Email</b></td>
                                <td class="small-panel-heading"><b>Action</b></td>
                            </tr>
                            @foreach($list as $index => $l)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>
                                        <a href="{{ url('/admin/view-student') . '/' . $l->student_id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            {{\BIM\User::getName($l->student_id)}}
                                        </a>
                                    </td>
                                    <td>{{\BIM\User::getSurname($l->student_id)}}</td>
                                    <td>{{\BIM\Courses::getCourseName($l->course_id)}}</td>
                                    <td>{{\BIM\User::getEmail($l->student_id)}}</td>
                                    <td>
                                        <a href="{{ url('/admin/approve-to-course') . '/' . $l->id }} ">
                                            <button type="button" class="btn btn-success">Approve</button>
                                        </a>
                                        <a href="{{ url('/admin/view-student-course-info') . '/' . $l->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <button type="button" class="btn btn-primary">Review</button>
                                        </a>
                                        <a href="{{ url('/admin/reject') . '/' . $l->id }} ">
                                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">Reject</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                                @else
                        <h2 style="text-align: center;">There are no students waiting to be approved for the course at the moment</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
