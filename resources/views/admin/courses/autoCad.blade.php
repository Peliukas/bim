@extends('../layouts.single')

@section('content')
    <div class="panel-heading apply-for-course-title"></div>
    <div class="col-md-12 single-course-container">
        <div class="panel apply-for-course-description">
            <div class="panel-body">
                <p><label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH AutoCAD:</label><br>
                    {{ $values['experience'] }}
                </p>

                <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                    {{$values['software']}}<br>
                </p>

                <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                    {!! (array_key_exists('experience_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('experience_DrawE', $values)) ? '<input type="checkbox" checked disabled>Drawing entities <br>' : '' !!}
                    {!! (array_key_exists('experience_EditF', $values)) ? '<input type="checkbox" checked disabled>Editing features <br>' : '' !!}
                    {!! (array_key_exists('experience_Mod', $values)) ? '<input type="checkbox" checked disabled>Modifying <br>' : '' !!}
                    {!! (array_key_exists('experience_Layers', $values)) ? '<input type="checkbox" checked disabled>Layers <br>' : '' !!}
                    {!! (array_key_exists('experience_Prop', $values)) ? '<input type="checkbox" checked disabled>Properties <br>' : '' !!}
                    {!! (array_key_exists('experience_Blocks', $values)) ? '<input type="checkbox" checked disabled>Blocks <br>' : '' !!}
                    {!! (array_key_exists('experience_Param', $values)) ? '<input type="checkbox" checked disabled>Parametric <br>' : '' !!}
                    {!! (array_key_exists('experience_Dimen', $values)) ? '<input type="checkbox" checked disabled>Dimensioning <br>' : '' !!}
                    {!! (array_key_exists('experience_Cust', $values)) ? '<input type="checkbox" checked disabled>Customizing <br>' : '' !!}
                    {!! (array_key_exists('experience_Layouts', $values)) ? '<input type="checkbox" checked disabled>Layouts <br>' : '' !!}
                    {!! (array_key_exists('experience_Prints', $values)) ? '<input type="checkbox" checked disabled>Prints <br>' : '' !!}
                    {!! (array_key_exists('experience_Exports', $values)) ? '<input type="checkbox" checked disabled>Exports <br>' : '' !!}

                    {{ $values['experience_Other'] }}<br>
                </p>

                <p>TOPICS I AM MOSTLY INTERESTED IN:<br>
                    {!! (array_key_exists('interests_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('interests_DrawE', $values)) ? '<input type="checkbox" checked disabled>Drawing entities <br>' : '' !!}
                    {!! (array_key_exists('interests_EditF', $values)) ? '<input type="checkbox" checked disabled>Editing features <br>' : '' !!}
                    {!! (array_key_exists('interests_Mod', $values)) ? '<input type="checkbox" checked disabled>Modifying <br>' : '' !!}
                    {!! (array_key_exists('interests_Layers', $values)) ? '<input type="checkbox" checked disabled>Layers <br>' : '' !!}
                    {!! (array_key_exists('interests_Prop', $values)) ? '<input type="checkbox" checked disabled>Properties <br>' : '' !!}
                    {!! (array_key_exists('interests_Blocks', $values)) ? '<input type="checkbox" checked disabled>Blocks <br>' : '' !!}
                    {!! (array_key_exists('interests_Param', $values)) ? '<input type="checkbox" checked disabled>Parametric <br>' : '' !!}
                    {!! (array_key_exists('interests_Dimen', $values)) ? '<input type="checkbox" checked disabled>Dimensioning <br>' : '' !!}
                    {!! (array_key_exists('interests_Cust', $values)) ? '<input type="checkbox" checked disabled>Customizing <br>' : '' !!}
                    {!! (array_key_exists('interests_Layouts', $values)) ? '<input type="checkbox" checked disabled>Layouts <br>' : '' !!}
                    {!! (array_key_exists('interests_Prints', $values)) ? '<input type="checkbox" checked disabled>Prints <br>' : '' !!}
                    {!! (array_key_exists('interests_Exports', $values)) ? '<input type="checkbox" checked disabled>Exports <br>' : '' !!}

                <label for="exp" id="expL">EXPECTATIONS:</label><br>
                {{ $values['expectations'] }}
            </div>
        </div>
    </div>
@endsection
