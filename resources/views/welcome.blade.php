@extends('layouts.app')

@section('content')

    <div class="panel-heading col-md-12 start-page-title">Welcome to BIM Training Studio!</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">


                <div class="panel-body">
                    @if(Auth::check() && Auth::user()->status == 0)
                        Please wait until administrator approves you!
                    @else
                        <div class="col-md-12 start-page-main-container">

                                <img src="http://bimtrainingstudio.com/images/objectives-new.jpg">

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
