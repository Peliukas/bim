@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">Students waiting for approval</div>
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
                            @if(count($students) > 0)
                        <table class="table table-bordered">
                            <tr>
                                <td class="small-panel-heading"><b>#</b></td>
                                <td class="small-panel-heading"><b>Name</b></td>
                                <td class="small-panel-heading"><b>Surname</b></td>
                                <td class="small-panel-heading"><b>Email</b></td>
                                <td class="small-panel-heading"><b>Action</b></td>
                            </tr>
                            @foreach($students as $index => $student)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->surname}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>
                                        <a href="{{ url('/admin/approve-student') . '-' . $student->id }} ">
                                            <button type="button" class="btn btn-success">Approve</button>
                                        </a>
                                        <a href="{{ url('/admin/view-student') . '/' . $student->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            <button type="button" class="btn btn-primary">View</button>
                                        </a>
                                        <a href="{{ url('/admin/delete-student') . '-' . $student->id }} ">
                                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                            @else
                                <h2 style="text-align: center;">There are no students waiting for approvals at this time</h2>
                            @endif
                        {{$students->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
