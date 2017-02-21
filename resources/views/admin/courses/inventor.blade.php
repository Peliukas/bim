@extends('../layouts.single')

@section('content')
    <div class="panel-heading apply-for-course-title"></div>
    <div class="col-md-12 single-course-container">
        <div class="panel apply-for-course-description">
            <div class="panel-body">
                <p><label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH INVENTOR:</label><br>
                    {{ $values['experience'] }}<br></p>

                <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                    {{ $values['software'] }}<br></p>

                <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                    {!! (array_key_exists('experience_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('experience_2D', $values)) ? '<input type="checkbox" checked disabled>2D sketching <br>' : '' !!}
                    {!! (array_key_exists('experience_3D', $values)) ? '<input type="checkbox" checked disabled>3D modelling <br>' : '' !!}
                    {!! (array_key_exists('experience_Assemblies', $values)) ? '<input type="checkbox" checked disabled>Assemblies <br>' : '' !!}
                    {!! (array_key_exists('experience_ExpV', $values)) ? '<input type="checkbox" checked disabled>Exploded view <br>' : '' !!}
                    {!! (array_key_exists('experience_DrawF', $values)) ? '<input type="checkbox" checked disabled>Drawing features <br>' : '' !!}
                    {!! (array_key_exists('experience_Excel', $values)) ? '<input type="checkbox" checked disabled>Excel link <br>' : '' !!}
                    {!! (array_key_exists('experience_FEM', $values)) ? '<input type="checkbox" checked disabled>FEM analysis <br>' : '' !!}
                    {!! (array_key_exists('experience_InventorS', $values)) ? '<input type="checkbox" checked disabled>Inventor studio <br>' : '' !!}
                    {!! (array_key_exists('experience_SheetM', $values)) ? '<input type="checkbox" checked disabled>Sheet metal <br>' : '' !!}
                    {!! (array_key_exists('experience_PlasticP', $values)) ? '<input type="checkbox" checked disabled>Plastic parts <br>' : '' !!}
                    {!! (array_key_exists('experience_Frames', $values)) ? '<input type="checkbox" checked disabled>Frames <br>' : '' !!}
                    {!! (array_key_exists('experience_Welding', $values)) ? '<input type="checkbox" checked disabled>Welding <br>' : '' !!}
                    {!! (array_key_exists('experience_SurfaceM', $values)) ? '<input type="checkbox" checked disabled>Surface modelling <br>' : '' !!}
                    {!! (array_key_exists('experience_MoldD', $values)) ? '<input type="checkbox" checked disabled>Mold design <br>' : '' !!}
                    {!! (array_key_exists('experience_FlowS', $values)) ? '<input type="checkbox" checked disabled>Flow simulation <br>' : '' !!}
                    {!! (array_key_exists('experience_MoldR', $values)) ? '<input type="checkbox" checked disabled>Mold representation <br>' : '' !!}
                    {!! (array_key_exists('experience_iParts', $values)) ? '<input type="checkbox" checked disabled>iParts <br>' : '' !!}
                    {!! (array_key_exists('experience_iAssemblies', $values)) ? '<input type="checkbox" checked disabled>iAssemblies <br>' : '' !!}
                <hr>
                <p>TOPICS I AM MOSTLY INTERESTED IN:<br>
                    {!! (array_key_exists('interests_UI', $values)) ? '<input type="checkbox" checked disabled>User Interface <br>' : '' !!}
                    {!! (array_key_exists('interests_2D', $values)) ? '<input type="checkbox" checked disabled>2D sketching <br>' : '' !!}
                    {!! (array_key_exists('interests_3D', $values)) ? '<input type="checkbox" checked disabled>3D modelling <br>' : '' !!}
                    {!! (array_key_exists('interests_Assemblies', $values)) ? '<input type="checkbox" checked disabled>Assemblies <br>' : '' !!}
                    {!! (array_key_exists('interests_ExpV', $values)) ? '<input type="checkbox" checked disabled>Exploded view <br>' : '' !!}
                    {!! (array_key_exists('interests_DrawF', $values)) ? '<input type="checkbox" checked disabled>Drawing features <br>' : '' !!}
                    {!! (array_key_exists('interests_Excel', $values)) ? '<input type="checkbox" checked disabled>Excel link <br>' : '' !!}
                    {!! (array_key_exists('interests_FEM', $values)) ? '<input type="checkbox" checked disabled>FEM analysis <br>' : '' !!}
                    {!! (array_key_exists('interests_InventorS', $values)) ? '<input type="checkbox" checked disabled>Inventor studio <br>' : '' !!}
                    {!! (array_key_exists('interests_SheetM', $values)) ? '<input type="checkbox" checked disabled>Sheet metal <br>' : '' !!}
                    {!! (array_key_exists('interests_PlasticP', $values)) ? '<input type="checkbox" checked disabled>Plastic parts <br>' : '' !!}
                    {!! (array_key_exists('interests_Frames', $values)) ? '<input type="checkbox" checked disabled>Frames <br>' : '' !!}
                    {!! (array_key_exists('interests_Welding', $values)) ? '<input type="checkbox" checked disabled>Welding <br>' : '' !!}
                    {!! (array_key_exists('interests_SurfaceM', $values)) ? '<input type="checkbox" checked disabled>Surface modelling <br>' : '' !!}
                    {!! (array_key_exists('interests_MoldD', $values)) ? '<input type="checkbox" checked disabled>Mold design <br>' : '' !!}
                    {!! (array_key_exists('interests_FlowS', $values)) ? '<input type="checkbox" checked disabled>Flow simulation <br>' : '' !!}
                    {!! (array_key_exists('interests_MoldR', $values)) ? '<input type="checkbox" checked disabled>Mold representation <br>' : '' !!}
                    {!! (array_key_exists('interests_iParts', $values)) ? '<input type="checkbox" checked disabled>iParts <br>' : '' !!}
                    {!! (array_key_exists('interests_iAssemblies', $values)) ? '<input type="checkbox" checked disabled>iAssemblies <br>' : '' !!}
                </p>
                <p>My course level:<br>
                {{ (isset($values['course-level']) ? $values['course-level'] : '---') }}
                <hr>
                <label for="exp" id="expL">EXPECTATIONS:</label><br>
                {{ $values['expectations'] }}
            </div>
        </div>
    </div>
@endsection
