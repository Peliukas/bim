@extends('../layouts.single')

@section('content')
    <div class="panel-heading apply-for-course-title"></div>
    <div class="col-md-12 single-course-container">
        <div class="panel apply-for-course-description">
            <div class="panel-body">
                <p>
                    <label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH FUSION360:</label><br>
                    {{ $values['experience'] }}<br>
                </p>

                <p>
                    <label for="software" id="softwareL">SIMILAR SOFTWARES KNOWN:</label><br>
                    {{ $values['software'] }}<br>
                </p>
                <hr>
                <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                    {!! (array_key_exists('experience_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('experience_sketching', $values)) ? '<input type="checkbox" checked disabled>Sketching <br>' : '' !!}
                    {!! (array_key_exists('experience_Sculpting', $values)) ? '<input type="checkbox" checked disabled>Sculpting <br>' : '' !!}
                    {!! (array_key_exists('experience_modeling', $values)) ? '<input type="checkbox" checked disabled>Modeling <br>' : '' !!}
                    {!! (array_key_exists('experience_manage', $values)) ? '<input type="checkbox" checked disabled>Manage and Collaborate <br>' : '' !!}
                    {!! (array_key_exists('experience_assemblies', $values)) ? '<input type="checkbox" checked disabled>Assemblies <br>' : '' !!}
                    {!! (array_key_exists('experience_rendering', $values)) ? '<input type="checkbox" checked disabled>Rendering <br>' : '' !!}
                    {!! (array_key_exists('experience_drawings', $values)) ? '<input type="checkbox" checked disabled>Drawings <br>' : '' !!}
                    {!! (array_key_exists('experience_cam', $values)) ? '<input type="checkbox" checked disabled>CAM <br>' : '' !!}
                    {!! (array_key_exists('experience_animatios', $values)) ? '<input type="checkbox" checked disabled>Animations <br>' : '' !!}
                <hr>
                <p>TOPICS I HAVE Interested in WITH:<br>
                {!! (array_key_exists('interests_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                {!! (array_key_exists('interests_sketching', $values)) ? '<input type="checkbox" checked disabled>Sketching <br>' : '' !!}
                {!! (array_key_exists('interests_Sculpting', $values)) ? '<input type="checkbox" checked disabled>Sculpting <br>' : '' !!}
                {!! (array_key_exists('interests_modeling', $values)) ? '<input type="checkbox" checked disabled>Modeling <br>' : '' !!}
                {!! (array_key_exists('interests_manage', $values)) ? '<input type="checkbox" checked disabled>Manage and Collaborate <br>' : '' !!}
                {!! (array_key_exists('interests_assemblies', $values)) ? '<input type="checkbox" checked disabled>Assemblies <br>' : '' !!}
                {!! (array_key_exists('interests_rendering', $values)) ? '<input type="checkbox" checked disabled>Rendering <br>' : '' !!}
                {!! (array_key_exists('interests_drawings', $values)) ? '<input type="checkbox" checked disabled>Drawings <br>' : '' !!}
                {!! (array_key_exists('interests_cam', $values)) ? '<input type="checkbox" checked disabled>CAM <br>' : '' !!}
                {!! (array_key_exists('interests_animatios', $values)) ? '<input type="checkbox" checked disabled>Animations <br>' : '' !!}
                <hr>
                <p>EXPECTATIONS<br>
                    {{ $values['expectations'] }}<br>
                </p>
            </div>
        </div>
    </div>
@endsection
