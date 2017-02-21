@extends('../layouts.single')

@section('content')
    <div class="panel-heading apply-for-course-title"></div>
    <div class="col-md-12 single-course-container">
        <div class="panel apply-for-course-description">
            <div class="panel-body">
                <p>
                    <label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH ROBOT:</label><br>
                    {{ $values['experience'] }}
                </p>
                    <p>
                        <label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                        {{ $values['software'] }}<br>
                    </p>
                    <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                        {!! (array_key_exists('experience_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                        {!! (array_key_exists('experience_Workflow', $values)) ? '<input type="checkbox" checked disabled>Workflow <br>' : '' !!}
                        {!! (array_key_exists('experience_StrucM', $values)) ? '<input type="checkbox" checked disabled>Structure modeling <br>' : '' !!}
                        {!! (array_key_exists('experience_Loads', $values)) ? '<input type="checkbox" checked disabled>Loads <br>' : '' !!}
                        {!! (array_key_exists('experience_Analysis', $values)) ? '<input type="checkbox" checked disabled>Analysis <br>' : '' !!}
                        {!! (array_key_exists('experience_Results', $values)) ? '<input type="checkbox" checked disabled>Results <br>' : '' !!}
                        {!! (array_key_exists('experience_SteelD', $values)) ? '<input type="checkbox" checked disabled>Steel design <br>' : '' !!}
                        {!! (array_key_exists('experience_TimberD', $values)) ? '<input type="checkbox" checked disabled>Timber design <br>' : '' !!}
                        {!! (array_key_exists('experience_SteelC', $values)) ? '<input type="checkbox" checked disabled>Steel connections <br>' : '' !!}
                        {!! (array_key_exists('experience_Reinf', $values)) ? '<input type="checkbox" checked disabled>Reinforced concrete design <br>' : '' !!}
                        {!! (array_key_exists('experience_Reports', $values)) ? '<input type="checkbox" checked disabled>Printouts <br>' : '' !!}
                        {!! (array_key_exists('experience_StrucM', $values)) ? '<input type="checkbox" checked disabled>Reports <br>' : '' !!}
                        {{ $values['experience_OtherT'] }}<br>
                    </p>
                <hr>
                <p>TOPICS I AM MOSTLY INTERESTED IN:<br>
                    {!! (array_key_exists('interests_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('interests_Workflow', $values)) ? '<input type="checkbox" checked disabled>Workflow <br>' : '' !!}
                    {!! (array_key_exists('interests_StrucM', $values)) ? '<input type="checkbox" checked disabled>Structure modeling <br>' : '' !!}
                    {!! (array_key_exists('interests_Loads', $values)) ? '<input type="checkbox" checked disabled>Loads <br>' : '' !!}
                    {!! (array_key_exists('interests_Analysis', $values)) ? '<input type="checkbox" checked disabled>Analysis <br>' : '' !!}
                    {!! (array_key_exists('interests_Results', $values)) ? '<input type="checkbox" checked disabled>Results <br>' : '' !!}
                    {!! (array_key_exists('interests_SteelD', $values)) ? '<input type="checkbox" checked disabled>Steel design <br>' : '' !!}
                    {!! (array_key_exists('interests_TimberD', $values)) ? '<input type="checkbox" checked disabled>Timber design <br>' : '' !!}
                    {!! (array_key_exists('interests_SteelC', $values)) ? '<input type="checkbox" checked disabled>Steel connections <br>' : '' !!}
                    {!! (array_key_exists('interests_Reinf', $values)) ? '<input type="checkbox" checked disabled>Reinforced concrete design <br>' : '' !!}
                    {!! (array_key_exists('interests_Reports', $values)) ? '<input type="checkbox" checked disabled>Printouts <br>' : '' !!}
                    {!! (array_key_exists('interests_StrucM', $values)) ? '<input type="checkbox" checked disabled>Reports <br>' : '' !!}
                    <label for="exp" id="expL">EXPECTATIONS:</label><br>
                    <p>
                        {{ $values['expectations'] }}
                    </p>
            </div>
        </div>
    </div>
@endsection
