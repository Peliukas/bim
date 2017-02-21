@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">Your homework</div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">

                    <div class="panel-body">
                        @if(count($courseList) < 1)
                        <table class="table" style="text-align: center;">
                            <tr>
                                <td class="small-panel-heading"><b>Course name</b></td>
                                <td class="small-panel-heading"><b>Homework</b></td>
                                <td class="small-panel-heading"><b>Deadline</b></td>
                                <td class="small-panel-heading"><b>Action</b></td>
                            </tr>
                            @foreach($courseList as $list)
                                @foreach(\BIM\Homework::getHomework($list->course_id) as $count => $homework)
                                    @if(\BIM\HomeworkList::checkHomework($homework->id, Auth::user()->id))
                                    <tr style="background: #f5f5f5">

                                        <td>{{\BIM\Courses::getCourseName($homework->course_id)}}</td>
                                        <td>{{$homework->name}}</td>
                                        <td>{{$homework->deadline}}</td>
                                        <td>
                                            <a href="{{ url('/homework') .'-'.$homework->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                                <button class="btn btn-primary">View</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{$count+1}}</td>
                                        <td>{{\BIM\Courses::getCourseName($homework->course_id)}}</td>
                                        <td>{{$homework->name}}</td>
                                        <td>{{$homework->deadline}}</td>
                                        <td>
                                            <a href="{{ url('/homework') .'-'.$homework->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                                                <button class="btn btn-success">Do it!</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </table>
                        @else
                            <h2 style="text-align: center;">There is no homework for you right now :)</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
