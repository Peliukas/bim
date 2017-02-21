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
                        <form method="post">
                            {{ csrf_field() }}
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td>Select <input type="checkbox" id="selectAll"></td>
                                    </tr>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ \BIM\User::getName($student->student_id) . ' ' . \BIM\User::getSurname($student->student_id) }}</td>
                                            <td><input type="checkbox" value="{{$student->student_id}}" name="uz[]" class="uzsakymuCheck"> </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="aboutWhat" placeholder="Subject" class="form-control">
                                <br>
                                <textarea name="aboutWho" class="form-control"></textarea>
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
