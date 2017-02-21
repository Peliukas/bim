@extends('layouts.app')

@section('content')
    <div class="panel-heading apply-for-course-page-title">News feed</div>
    <div class="col-md-12 mountain-background">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel" style="border: none; background-color: transparent;">
                <div class="panel"style="border: none; background-color: transparent;">
                    <div class="panel-body">
                        @foreach($announcements as $announcement)
                            <div class="panel homepage-announcement announcement-panel">
                                <div class="homepage-announcement-inner-container">
                                    <div class="panel-heading">
                                        <div class="col-md-12">
                                            <strong>{{$announcement->title}} </strong>
                                        </div>
                                        <div class="announcement-posted-at col-md-12">
                                            Posted on: {{substr($announcement->created_at, 0, 16)}}
                                        </div>
                                    </div>
                                    <div class="panel-body homepage-announcement-text">
                                        {!! $announcement->text !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($missingInventor)
                        <div class="modal fade" id="missingInventor" tabindex="-1" role="dialog" aria-labelledby="newSchedule">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/update-inventor') }}">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            Please choose your knowledge about Inventor
                                        </div>
                                        <div class="modal-body">
                                            <input type="radio" name="course-level" id="select-level" value="level-beginner">Beginner<br>
                                            <input type="radio" name="course-level" id="select-level" value="level-advanced">Advanced<br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($missingRevit)
                        <div class="modal fade" id="missingRevit" tabindex="-1" role="dialog" aria-labelledby="newSchedule">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/update-revit') }}">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            On which days you would like to attend?
                                        </div>
                                        <div class="modal-body">
                                            <input type="radio" name="which-days" id="select-days" value="mon-we">Monday and Wednesday<br>
                                            <input type="radio" name="which-days" id="select-days" value="tue-thur">Tuesday and Thursday<br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($missingRevitApplication))
                        @include('user.partials.missingRevit')
                    @endif
                    @if(isset($missingInventorApplication))
                        @include('user.partials.missingInventor')
                    @endif
                    @if(isset($missingAutoCAD))
                        @include('user.partials.missingAutoCAD')
                    @endif
                    @if(isset($missingFusion360))
                        @include('user.partials.missingFusion360')
                    @endif
                    @if(isset($missingBIMFocus))
                        @include('user.partials.missingBIMFocus')
                    @endif
                    @if(isset($missingRobot))
                        @include('user.partials.missingRobot')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


