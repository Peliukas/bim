@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">Teachers applications</div>
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
                        <table class="table table-bordered">
                            <tr>
                                <td class="small-panel-heading"><b>Name</b></td>
                                <td class="small-panel-heading"><b>Surname</b></td>
                                <td class="small-panel-heading"><b>Email</b></td>
                                <td class="small-panel-heading"><b>Action</b></td>
                            </tr>
                            @foreach($teachers as $index => $teacher)
                                <tr>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->surname}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>
                                        <a href="{{ url('/admin/approve-teacher') . '/' . $teacher->id }} ">
                                            <button type="button" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</button>
                                        </a>
                                        <a href="{{ url('/admin/reject-teacher') . '-' . $teacher->id }} ">
                                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">Reject</button>
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
