@extends('../layouts.single')

@section('content')
    <div class="panel-heading apply-for-course-title"></div>
    <div class="col-md-12 single-course-container">
        <div class="panel apply-for-course-description" >
            <div class="panel-body">
                <p>
                    <label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH REVIT:</label><br>
                    {{ $values['revit_experience'] }}<br>
                </p>

                <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                    {{ $values['software'] }}<br>
                </p>

                <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                    {!! (array_key_exists('experience_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('experience_Template', $values)) ? '<input type="checkbox" checked disabled>Template <br>' : '' !!}
                    {!! (array_key_exists('experience_Levels', $values)) ? '<input type="checkbox" checked disabled>Levels, grids <br>' : '' !!}
                    {!! (array_key_exists('experience_Parameters', $values)) ? '<input type="checkbox" checked disabled>Parameters <br>' : '' !!}
                    {!! (array_key_exists('experience_Walls', $values)) ? '<input type="checkbox" checked disabled>Walls and foundations <br>' : '' !!}
                    {!! (array_key_exists('experience_CWalls', $values)) ? '<input type="checkbox" checked disabled>Curtain walls <br>' : '' !!}
                    {!! (array_key_exists('experience_Openings', $values)) ? '<input type="checkbox" checked disabled>Openings <br>' : '' !!}
                    {!! (array_key_exists('experience_Floors', $values)) ? '<input type="checkbox" checked disabled>Floors and Ceilings <br>' : '' !!}
                    {!! (array_key_exists('experience_Roofs', $values)) ? '<input type="checkbox" checked disabled>Roofs <br>' : '' !!}
                    {!! (array_key_exists('experience_Staircases', $values)) ? '<input type="checkbox" checked disabled>Staircases and railings <br>' : '' !!}
                    {!! (array_key_exists('experience_Site', $values)) ? '<input type="checkbox" checked disabled>Site <br>' : '' !!}
                    {!! (array_key_exists('experience_ImpExp', $values)) ? '<input type="checkbox" checked disabled>Import and export <br>' : '' !!}
                    {!! (array_key_exists('experience_Tags', $values)) ? '<input type="checkbox" checked disabled>Annotations, keynotes, tags <br>' : '' !!}
                    {!! (array_key_exists('experience_Massing', $values)) ? '<input type="checkbox" checked disabled>Massing <br>' : '' !!}
                    {!! (array_key_exists('experience_Phases', $values)) ? '<input type="checkbox" checked disabled>Phases <br>' : '' !!}
                    {!! (array_key_exists('experience_Schedules', $values)) ? '<input type="checkbox" checked disabled>Schedules <br>' : '' !!}
                    {!! (array_key_exists('experience_Docs', $values)) ? '<input type="checkbox" checked disabled>Construction documents <br>' : '' !!}
                    {!! (array_key_exists('experience_Rendering', $values)) ? '<input type="checkbox" checked disabled>Rendering <br>' : '' !!}
                    {!! (array_key_exists('experience_Structure', $values)) ? '<input type="checkbox" checked disabled>Structure <br>' : '' !!}
                    {!! (array_key_exists('experience_MEP', $values)) ? '<input type="checkbox" checked disabled>MEP <br>' : '' !!}
                    {!! (array_key_exists('experience_Energy', $values)) ? '<input type="checkbox" checked disabled>Energy analysis <br>' : '' !!}
                    {!! (array_key_exists('experience_Materials', $values)) ? '<input type="checkbox" checked disabled>Materials <br>' : '' !!}
                    {!! (array_key_exists('experience_WorkS', $values)) ? '<input type="checkbox" checked disabled>Worksharing <br>' : '' !!}
                    {!! (array_key_exists('experience_DesignO', $values)) ? '<input type="checkbox" checked disabled>Design options <br>' : '' !!}
                    {!! (array_key_exists('experience_CustomE', $values)) ? '<input type="checkbox" checked disabled>Custom elements <br>' : '' !!}
                    {!! (array_key_exists('experience_LinkedF', $values)) ? '<input type="checkbox" checked disabled>Linked files <br>' : '' !!}
                    {!! (array_key_exists('experience_Families', $values)) ? '<input type="checkbox" checked disabled>Families <br>' : '' !!}
                </p>

                <p>TOPICS I AM MOSTLY INTERESTED IN:<br>
                {!! (array_key_exists('interests_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                {!! (array_key_exists('interests_Template', $values)) ? '<input type="checkbox" checked disabled>Template <br>' : '' !!}
                {!! (array_key_exists('interests_Levels', $values)) ? '<input type="checkbox" checked disabled>Levels, grids <br>' : '' !!}
                {!! (array_key_exists('interests_Parameters', $values)) ? '<input type="checkbox" checked disabled>Parameters <br>' : '' !!}
                {!! (array_key_exists('interests_Walls', $values)) ? '<input type="checkbox" checked disabled>Walls and foundations <br>' : '' !!}
                {!! (array_key_exists('interests_CWalls', $values)) ? '<input type="checkbox" checked disabled>Curtain walls <br>' : '' !!}
                {!! (array_key_exists('interests_Openings', $values)) ? '<input type="checkbox" checked disabled>Openings <br>' : '' !!}
                {!! (array_key_exists('interests_Floors', $values)) ? '<input type="checkbox" checked disabled>Floors and Ceilings <br>' : '' !!}
                {!! (array_key_exists('interests_Roofs', $values)) ? '<input type="checkbox" checked disabled>Roofs <br>' : '' !!}
                {!! (array_key_exists('interests_Staircases', $values)) ? '<input type="checkbox" checked disabled>Staircases and railings <br>' : '' !!}
                {!! (array_key_exists('interests_Site', $values)) ? '<input type="checkbox" checked disabled>Site <br>' : '' !!}
                {!! (array_key_exists('interests_ImpExp', $values)) ? '<input type="checkbox" checked disabled>Import and export <br>' : '' !!}
                {!! (array_key_exists('interests_Tags', $values)) ? '<input type="checkbox" checked disabled>Annotations, keynotes, tags <br>' : '' !!}
                {!! (array_key_exists('interests_Massing', $values)) ? '<input type="checkbox" checked disabled>Massing <br>' : '' !!}
                {!! (array_key_exists('interests_Phases', $values)) ? '<input type="checkbox" checked disabled>Phases <br>' : '' !!}
                {!! (array_key_exists('interests_Schedules', $values)) ? '<input type="checkbox" checked disabled>Schedules <br>' : '' !!}
                {!! (array_key_exists('interests_Docs', $values)) ? '<input type="checkbox" checked disabled>Construction documents <br>' : '' !!}
                {!! (array_key_exists('interests_Rendering', $values)) ? '<input type="checkbox" checked disabled>Rendering <br>' : '' !!}
                {!! (array_key_exists('interests_Structure', $values)) ? '<input type="checkbox" checked disabled>Structure <br>' : '' !!}
                {!! (array_key_exists('interests_MEP', $values)) ? '<input type="checkbox" checked disabled>MEP <br>' : '' !!}
                {!! (array_key_exists('interests_Energy', $values)) ? '<input type="checkbox" checked disabled>Energy analysis <br>' : '' !!}
                {!! (array_key_exists('interests_Materials', $values)) ? '<input type="checkbox" checked disabled>Materials <br>' : '' !!}
                {!! (array_key_exists('interests_WorkS', $values)) ? '<input type="checkbox" checked disabled>Worksharing <br>' : '' !!}
                {!! (array_key_exists('interests_DesignO', $values)) ? '<input type="checkbox" checked disabled>Design options <br>' : '' !!}
                {!! (array_key_exists('interests_CustomE', $values)) ? '<input type="checkbox" checked disabled>Custom elements <br>' : '' !!}
                {!! (array_key_exists('interests_LinkedF', $values)) ? '<input type="checkbox" checked disabled>Linked files <br>' : '' !!}
                {!! (array_key_exists('interests_Families', $values)) ? '<input type="checkbox" checked disabled>Families <br>' : '' !!}
                <p>I WOULD LIKE TO ATTEND CLASSES ON:<br>
                    {{ (isset($values['which-days']) ? $values['which-days'] : '---') }}

                </p>
                <label for="exp" id="expL">EXPECTATIONS:</label><br>
                {{ $values['expectations'] }}
            </div>
        </div>
    </div>
@endsection
