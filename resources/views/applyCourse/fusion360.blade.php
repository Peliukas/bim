@extends('../layouts.single')

@section('content')
    <div class="panel-heading apply-for-course-title">Apply for {{$course->name}}</div>
    <div class="col-md-12 single-course-container">
        <div class="panel apply-for-course-description">

        <div class="panel-body">
                {{$course->description}}
                <hr>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST">
                    {{ csrf_field() }}

                    <p><label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH FUSION360:</label><br>
                        <input id="yrs" class="fullwidth-text-input" name="experience" type="text"><br></p>

                    <p><label for="software" id="softwareL">SIMILAR SOFTWARES KNOWN:</label><br>
                        <input id="software" class="fullwidth-text-input" name="software" type="text"><br></p>

                    <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                        <input type="checkbox" name="experience UI" id="UI">User Interface<br>
                        <input type="checkbox" name="experience sketching" id="sketching">Sketching<br>
                        <input type="checkbox" name="experience Sculpting" id="Sculpting">Sculpting<br>
                        <input type="checkbox" name="experience modeling" id="modeling">Modeling<br>
                        <input type="checkbox" name="experience manage" id="manage&Coll">Manage and Collaborate<br>
                        <input type="checkbox" name="experience assemblies" id="assemblies">Assemblies<br>
                        <input type="checkbox" name="experience rendering" id="rendering">Rendering<br>
                        <input type="checkbox" name="experience drawings" id="drawings">Drawings<br>
                        <input type="checkbox" name="experience cam" id="cam">CAM<br>
                        <input type="checkbox" name="experience animatios" id="animatios">Animations<br>
                        <input type="checkbox" name="experience Other" id="Other">Other (fill in)<br>
                        <input type="text" class="fullwidth-text-input" name="experience Other" id="OtherT"><br></p>
                    <br>

                    <p>TOPICS I HAVE Interested in WITH:<br>
                        <input type="checkbox" name="interests UI" id="UI2">User Interface<br>
                        <input type="checkbox" name="interests sketching" id="sketching2">Sketching<br>
                        <input type="checkbox" name="interests Sculpting" id="Sculpting2">Sculpting<br>
                        <input type="checkbox" name="interests modeling" id="modeling2">Modeling<br>
                        <input type="checkbox" name="interests manage" id="manage&Coll2">Manage and Collaborate<br>
                        <input type="checkbox" name="interests assemblies" id="assemblies2">Assemblies<br>
                        <input type="checkbox" name="interests rendering" id="rendering2">Rendering<br>
                        <input type="checkbox" name="interests drawings" id="drawings2">Drawings<br>
                        <input type="checkbox" name="interests cam" id="cam2">CAM<br>
                        <input type="checkbox" name="interests animatios" id="animatios2">Animations<br>
                        <input type="checkbox" name="interests Other" id="Other2">Other (fill in)<br>
                        <input type="text" class="fullwidth-text-input" name="interests Other" id="OtherT2"><br></p>
                    <br>


                    <p>EXPECTATIONS<br>
                        Write a few sentences on what are your expectations for this course, why you want to learn Fusion 360
                        and what is motivating you the most.<br>
                        <input type="text" class="fullwidth-text-input" name="expectations" id="exp"><br></p>
                    
                    <button type="submit" class="btn btn-update-info">Apply</button>
                </form>
            </div>
        </div>
    </div>
@endsection
