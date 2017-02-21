@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">List of students</div>
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
                        <form method="get">
                            <label for="student">Search: </label>
                            <input type="text" name="search" id="student">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
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
                                    <td>{{ ($students->currentPage() - 1) * $students->perpage() + $index +1 }}</td>
                                    <td><a href="{{ url('/admin/view-student') .'/' . $student->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                            {{$student->name}}
                                        </a>
                                        </td>
                                    <td>{{$student->surname}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>
                                        @if($student->admin == 1)
                                            <a href="{{ url('/admin/remove-admin') . '/' . $student->id }} ">
                                                <button type="button" class="btn btn-warning" onclick="return confirm('Are you sure?')">Remove admin</button>
                                            </a>
                                        @else
                                            <a href="{{ url('/admin/make-admin') . '/' . $student->id }} ">
                                                <button type="button" class="btn btn-success" onclick="return confirm('Are you sure?')">Make admin</button>
                                            </a>
                                        @endif
                                        <a href="{{ url('/admin/delete-student') . '-' . $student->id }} ">
                                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$students->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
