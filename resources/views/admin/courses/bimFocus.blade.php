@extends('../layouts.single')

@section('content')
    <div class="panel-heading apply-for-course-title"></div>
    <div class="col-md-12 single-course-container">
        <div class="panel apply-for-course-description">
            <div class="panel-body">
                <p>
                    <label for="yrs" id="yrsL">YEARS OF EXPERIENCE:</label><br>
                    {{ $values['bimfocu'] }}<br>
                </p>

                <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                    {{ $values['experience'] }}<br>
                </p>

                <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Template <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Levels, grids <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Parameters <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Walls and foundations <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Curtain walls <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Openings <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Floors and Ceilings <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Staircases and railings <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Site <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Import and export <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Annotations, keynotes, tags <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Massing <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Phases <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Schedules <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Construction documents <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Rendering <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Structure <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>MEP <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Energy analysis <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Worksharing <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Design options <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Custom elements <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Linked files <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>Families <br>' : '' !!}
                <br>

                <p>TOPICS I AM MOSTLY INTERESTED IN IN REVIT:<br>
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Template <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Levels, grids <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Parameters <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Walls and foundations <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Curtain walls <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Openings <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Floors and Ceilings <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Staircases and railings <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Site <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Import and export <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Annotations, keynotes, tags <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Massing <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Phases <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Schedules <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Construction documents <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Rendering <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Structure <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>MEP <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Energy analysis <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Worksharing <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Design options <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Custom elements <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Linked files <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>Families <br>' : '' !!}
                </p>
                <br>

                <p>TOPICS I AM FAMILIAR WITH IN BIM FIELD:<br>
                    {!! (array_key_exists('experience_Th', $values)) ? '<input type="checkbox" checked disabled>Theory <br>' : '' !!}
                    {!! (array_key_exists('experience_BIMint', $values)) ? '<input type="checkbox" checked disabled>BIM integration <br>' : '' !!}
                    {!! (array_key_exists('experience_ITinf', $values)) ? '<input type="checkbox" checked disabled>IT infrastructure (Computer knowledge) <br>' : '' !!}
                    {!! (array_key_exists('experience_BIMstandards', $values)) ? '<input type="checkbox" checked disabled>BIM standards <br>' : '' !!}
                    {!! (array_key_exists('experience_Libraries', $values)) ? '<input type="checkbox" checked disabled>Libraries <br>' : '' !!}
                    {!! (array_key_exists('experience_FileTypes', $values)) ? '<input type="checkbox" checked disabled>File types <br>' : '' !!}
                    {!! (array_key_exists('experience_ProjectStr', $values)) ? '<input type="checkbox" checked disabled>Project structure <br>' : '' !!}
                    {!! (array_key_exists('experience_DataExchangeF', $values)) ? '<input type="checkbox" checked disabled>Data exchange formats <br>' : '' !!}
                    {!! (array_key_exists('experience_DocumentWork', $values)) ? '<input type="checkbox" checked disabled>Document workflows <br>' : '' !!}
                    {!! (array_key_exists('experience_ModelingStrat', $values)) ? '<input type="checkbox" checked disabled>Modeling strategies <br>' : '' !!}
                    {!! (array_key_exists('interests_Coordination', $values)) ? '<input type="checkbox" checked disabled>Coordination <br>' : '' !!}
                    {!! (array_key_exists('experience_ResearchDevBIM', $values)) ? '<input type="checkbox" checked disabled>Research and development of BIM <br>' : '' !!}
                    {!! (array_key_exists('experience_Coordination', $values)) ? '<input type="checkbox" checked disabled>Coordination <br>' : '' !!}
                    {!! (array_key_exists('experience_ClashDet', $values)) ? '<input type="checkbox" checked disabled>Clash detection <br>' : '' !!}
                </p>
                <br>
                <br>

                <p>WHY DO YOU WANT TO PARTICIPATE IN BIM FOCUS GROUP?<br>
                    Write a few sentences on why you want to participate:<br>
                    <input type="text" class="fullwidth-text-input" name="participation" id="WhyDoYou"><br></p>
                </p>
                <br>

                <p>DO YOU WANT TO JOIN WITH YOUR GROUP OR BY YOURSELF?<br>
                    <input type="checkbox" name="join" id="Grp">Group<br>
                    <input type="checkbox" name="join" id="Persnl">Personal<br>
                </p>
                <br>

                <p>WHAT DO YOU THINK ARE THE BIGGEST STRUGGLES WHILE IMPLEMENTING BIM IN A SCHOOL PROJECT?<br>
                    Write a few sentences on what has stood in a way of full implementation of BIM in your previous
                    projects (if 1 semester, leave empty.)<br>
                    <input type="text" class="fullwidth-text-input" name="struggles" id="BIMSchoolP"><br></p>
                </p>
                <br>

                <p>WHAT WOULD YOU LIKE TO GET HELP WITH?<br>
                    Describe issues you are mostly experiencing:<br>
                    <input type="text" class="fullwidth-text-input" name="help" id="HelpWith"><br></p>
                </p>
                <br>

                <p>DO YOU HAVE ANY PREVIOUS EXPERIENCE OF IMPLEMENTING BIM IN A PROJECT?<br>
                    Any school orother project done in Revit?<br>
                    <input type="text" class="fullwidth-text-input" name="experiences ImplemEXP" id="ImplemEXP"><br></p>
                </p>
                <br>


                <p>EXPECTATIONS<br>
                    Write a few sentences on what are your expectations for this group, why you want to learn more about
                    BIM and what is motivating you the most.<br>
                    <input type="text" class="fullwidth-text-input" name="expectations" id="exp"><br></p>
            </div>
        </div>
    </div>
@endsection
