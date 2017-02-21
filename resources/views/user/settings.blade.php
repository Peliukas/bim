@extends('layouts.app')

@section('content')
<div class="col-md-12 settings-background">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 settings-container">
                <div class="panel panel-default">
                    <div class="settings-inner-panel">
                        <div class="panel-heading settings-page-title">Update personal info
                            <a href="{{ url('password') }}">
                                <button class="btn btn-default">
                                    Change password
                                </button>
                            </a></div>
                        <div class="panel-body">
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="form-horizontal setting-form" role="form" method="POST" action="{{ url('/update-profile') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                    <label for="surname" class="col-md-4 control-label">Surname</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" disabled>

                                        @if ($errors->has('surname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('studentID') ? ' has-error' : '' }}">
                                    <label for="studentID" class="col-md-4 control-label">Student ID</label>

                                    <div class="col-md-6">
                                        <input id="studentID" type="text" class="form-control" name="studentID" value="{{ $user->student_id }}" disabled>

                                        @if ($errors->has('studentID'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('studentID') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                    <label for="birthday" class="col-md-4 control-label">Date of Birth</label>

                                    <div class="col-md-6">
                                        <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $user->dateOfBirth }}" disabled>

                                        @if ($errors->has('birthday'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender" class="col-md-4 control-label">Gender</label>

                                    <div class="col-md-6">
                                        <select id="gender" name="gender" class="form-control">
                                            <option {{($user->gender == 'male') ? 'selected="selected"' : ''}} value="male">Male</option>
                                            <option {{($user->gender == 'female') ? 'selected="selected"' : ''}} value="female">Female</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="country" class="col-md-4 control-label">Country of Origin</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text" class="form-control" name="country" value="{{ $user->country }}" disabled>

                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('languages') ? ' has-error' : '' }}">
                                    <label for="languages" class="col-md-4 control-label">Language spoken</label>

                                    <div class="col-md-6">
                                        <input id="languages" type="text" class="form-control" name="languages" value="{{ $user->languages }}">

                                        @if ($errors->has('languages'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('languages') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('studyProgram') ? ' has-error' : '' }}">
                                    <label for="studyProgram" class="col-md-4 control-label">Study program</label>

                                    <div class="col-md-6">
                                        <input id="studyProgram" type="text" class="form-control" name="studyProgram" value="{{ $user->study_programme }}" disabled>

                                        @if ($errors->has('studyProgram'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('studyProgram') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                                    <label for="semester" class="col-md-4 control-label">Semester</label>
                                    <div class="col-md-6">
                                        <select id="semester" name="semester" class="form-control" disabled>
                                            <option {{($user->semester == 1) ? 'selected="selected"' : ''}} value="1">1st</option>
                                            <option {{($user->semester == 2) ? 'selected="selected"' : ''}} value="2">2nd</option>
                                            <option {{($user->semester == 3) ? 'selected="selected"' : ''}} value="3">3rd</option>
                                            <option {{($user->semester == 4) ? 'selected="selected"' : ''}} value="4">4th</option>
                                            <option {{($user->semester == 5) ? 'selected="selected"' : ''}} value="5">5th</option>
                                            <option {{($user->semester == 6) ? 'selected="selected"' : ''}} value="6">6th</option>
                                            <option {{($user->semester == 7) ? 'selected="selected"' : ''}} value="7">7th</option>
                                            <option {{($user->semester == 8) ? 'selected="selected"' : ''}} value="8">8th</option>
                                            <option {{($user->semester == 9) ? 'selected="selected"' : ''}} value="9">9th</option>
                                        </select>
                                        @if ($errors->has('semester'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('typeOfStudies') ? ' has-error' : '' }}">
                                    <label for="typeOfStudies" class="col-md-4 control-label">Type of studies</label>
                                    <div class="col-md-6">
                                        <select id="typeOfStudies" name="typeOfStudies" class="form-control">
                                            <option {{($user->fulltime == 1) ? 'selected="selected"' : ''}} value="fulltime">Full time</option>
                                            <option {{($user->erasmus == 1) ? 'selected="selected"' : ''}} value="erasmus">Exchange student</option>
                                        </select>
                                        @if ($errors->has('typeOfStudies'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('typeOfStudies') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        {{--<button type="submit" class="btn btn-update-info">--}}
                                          {{--<strong>Update profile settings</strong>--}}
                                        {{--</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
