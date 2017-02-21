@extends('../layouts.single')

@section('content')
    <div class="panel-heading apply-for-course-title">
        <h2>Apply for {{$course->name}}</h2>
    </div>
    <div class="col-md-12 single-course-container">
        <div class="panel apply-for-course-description" >

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

                <p><label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH REVIT:</label><br>
                    <input id="yrs" name="revit experience" class="fullwidth-text-input" type="text"><br></p>

                <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                    <input id="software" class="fullwidth-text-input" name="software" type="text"><br></p>

                    <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                        <input type="checkbox" name="experience UI" id="UI">User Interface<br>
                        <input type="checkbox" name="experience Template" id="Template">Template<br>
                        <input type="checkbox" name="experience Levels" id="Levels">Levels, grids<br>
                        <input type="checkbox" name="experience Parameters" id="Parameters">Parameters<br>
                        <input type="checkbox" name="experience Walls" id="Walls">Walls and foundations<br>
                        <input type="checkbox" name="experience CWalls" id="CWalls">Curtain walls<br>
                        <input type="checkbox" name="experience Openings" id="Openings">Openings<br>
                        <input type="checkbox" name="experience Floors" id="Floors">Floors and Ceilings<br>
                        <input type="checkbox" name="experience Roofs" id="Roofs">Roofs<br>
                        <input type="checkbox" name="experience Staircases" id="Staircases">Staircases and railings<br>
                        <input type="checkbox" name="experience Site" id="Site">Site<br>
                        <input type="checkbox" name="experience ImpExp" id="ImpExp">Import and export<br>
                        <input type="checkbox" name="experience Tags" id="Tags">Annotations, keynotes, tags<br>
                        <input type="checkbox" name="experience Massing" id="Massing">Massing<br>
                        <input type="checkbox" name="experience Phases" id="Phases">Phases<br>
                        <input type="checkbox" name="experience Schedules" id="Schedules">Schedules<br>
                        <input type="checkbox" name="experience Docs" id="Docs">Construction documents<br>
                        <input type="checkbox" name="experience Rendering" id="Rendering">Rendering<br>
                        <input type="checkbox" name="experience Structure" id="Structure">Structure<br>
                        <input type="checkbox" name="experience MEP" id="MEP">MEP<br>
                        <input type="checkbox" name="experience Energy" id="Energy">Energy analysis<br>
                        <input type="checkbox" name="experience Materials" id="Materials">Materials<br>
                        <input type="checkbox" name="experience WorkS" id="WorkS">Worksharing<br>
                        <input type="checkbox" name="experience DesignO" id="DesignO">Design options<br>
                        <input type="checkbox" name="experience CustomE" id="CustomE">Custom elements<br>
                        <input type="checkbox" name="experience LinkedF" id="LinkedF">Linked files<br>
                        <input type="checkbox" name="experience Families" id="Families">Families<br>
                        <input type="checkbox" name="experience Other" id="Other">Other (fill in)<br>
                        <input type="text" name="OtherT" id="OtherT" class="fullwidth-text-input"><br></p>

                    <p>TOPICS I AM MOSTLY INTERESTED IN:<br>
                        <input type="checkbox" name="interests UI" id="UI2">User Interface<br>
                        <input type="checkbox" name="interests Template" id="Template2">Template<br>
                        <input type="checkbox" name="interests Levels" id="Levels2">Levels, grids<br>
                        <input type="checkbox" name="interests Parameters" id="Parameters2">Parameters<br>
                        <input type="checkbox" name="interests Walls" id="Walls2">Walls and foundations<br>
                        <input type="checkbox" name="interests CWalls" id="CWalls2">Curtain walls<br>
                        <input type="checkbox" name="interests Openings" id="Openings2">Openings<br>
                        <input type="checkbox" name="interests Floors" id="Floors2">Floors and Ceilings<br>
                        <input type="checkbox" name="interests Roofs" id="Roofs2">Roofs<br>
                        <input type="checkbox" name="interests Staircases" id="Staircases2">Staircases and railings<br>
                        <input type="checkbox" name="interests Site" id="Site2">Site<br>
                        <input type="checkbox" name="interests ImpExp" id="ImpExp2">Import and export<br>
                        <input type="checkbox" name="interests Tags" id="Tags2">Annotations, keynotes, tags<br>
                        <input type="checkbox" name="interests Massing" id="Massing2">Massing<br>
                        <input type="checkbox" name="interests Phases" id="Phases2">Phases<br>
                        <input type="checkbox" name="interests Schedules" id="Schedules2">Schedules<br>
                        <input type="checkbox" name="interests Docs" id="Docs2">Construction documents<br>
                        <input type="checkbox" name="interests Rendering" id="Rendering2">Rendering<br>
                        <input type="checkbox" name="interests Structure" id="Structure2">Structure<br>
                        <input type="checkbox" name="interests MEP" id="MEP2">MEP<br>
                        <input type="checkbox" name="interests Energy" id="Energy2">Energy analysis<br>
                        <input type="checkbox" name="interests Materials" id="Materials2">Materials<br>
                        <input type="checkbox" name="interests WorkS" id="WorkS2">Worksharing<br>
                        <input type="checkbox" name="interests DesignO" id="DesignO2">Design options<br>
                        <input type="checkbox" name="interests CustomE" id="CustomE2">Custom elements<br>
                        <input type="checkbox" name="interests LinkedF" id="LinkedF2">Linked files<br>
                        <input type="checkbox" name="interests Families" id="Families2">Families<br>
                        <input type="checkbox" name="interests Other" id="Other2">Other (fill in)<br>
                        <input type="text" class="fullwidth-text-input" name="interests" id="OtherT2"><br></p>
                <p>I WOULD LIKE TO ATTEND CLASSES ON:<br>
                    <input type="radio" name="which-days" id="select-days" value="mon-we">Monday and Wednesday<br>
                    <input type="radio" name="which-days" id="select-days" value="tue-thur">Tuesday and Thursday<br>

                </p>
                <label for="exp" id="expL">EXPECTATIONS:</label><br>
                <input type="text" class="fullwidth-text-input" name="expectations" id="exp"><br>
                <label id="expL2"> Write a few sentences on what are your expectations for this course, why you want to learn Revit and what is motivating you the most. </label>

                <button type="submit" class="btn btn-update-info">Apply</button>
            </form>
        </div>
    </div>
</div>
@endsection
