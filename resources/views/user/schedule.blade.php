@extends('../layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">Your schedule</div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel col-md-12 schedule-panel">

                    <div class="panel-body">
                        @if(isset($calendar))
                            {!! $calendar !!}
                        <table class="table schedule-table" style="text-align: center;">
                            <tr>
                                <td class="small-panel-heading"><b>Course name</b></td>
                                <td class="small-panel-heading"><b>Lecture</b></td>
                                <td class="small-panel-heading"><b>Date</b></td>
                                <td class="small-panel-heading"><b>Place</b></td>
                            </tr>

                            @foreach($enrollments as $list)
                                @foreach(\BIM\Schedule::getSchedule($list->course_id) as $schedule)
                                    @if($schedule->when >= Date('Y-m-d') && $schedule->whenTime > Date('H:i:s'))
                                        <tr>
                                            <td>{{\BIM\Courses::getCourseName($schedule->course_id)}}</td>
                                            <td>{{$schedule->name}}</td>
                                            <td>{{$schedule->when}} - {{substr($schedule->whenTime,0,5)}}</td>
                                            <td>{{$schedule->place}}</td>
                                        </tr>
                                    @else
                                        <tr style="background: #f5f5f5">
                                            <td>{{\BIM\Courses::getCourseName($schedule->course_id)}}</td>
                                            <td>{{$schedule->name}}</td>
                                            <td>{{$schedule->when}} - {{substr($schedule->whenTime,0,5)}}</td>
                                            <td>{{$schedule->place}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </table>
                            @else
                            <h2 style="text-align: center;">There are no upcoming lessons for you yet</h2>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
