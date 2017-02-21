@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">Send email to students</div>
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
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-4">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach($courses as $course)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$course->id}}" aria-expanded="false" aria-controls="collapse{{$course->id}}">
                                                        {{$course->name}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse{{$course->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$course->id}}">
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>Name</td>
                                                            <td></td>
                                                        </tr>
                                                        @foreach(\BIM\Enrollment::students($course->id) as $student)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ url('/admin/view-student') . '/' . $student->student_id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                                                        {{\BIM\User::getFullName($student->student_id)}}
                                                                    </a>
                                                                </td>
                                                                <td><input type="checkbox" value="{{$student->student_id}}" name="uz[]" class="uzsakymuCheck"> </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="aboutWhat" placeholder="Subject" class="form-control">
                                <br>
                                <textarea name="aboutWho" class="form-control"></textarea>
                                <br>
                                <input type="file" name="attachment" id="attachment">
                                <br>
                                <button class="btn btn-success" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
