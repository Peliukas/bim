<div class="modal fade" id="missingInventorApplication" tabindex="-1" role="dialog" aria-labelledby="missingInventorApplication">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/missing-course/3') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    Inventor course application
                </div>
                <div class="modal-body">
                    <p><label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH INVENTOR:</label><br>
                        <input id="yrs" class="fullwidth-text-input" name="experience" type="text"><br></p>

                    <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                        <input id="software" class="fullwidth-text-input"  name="software" type="text"><br></p>

                    <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                        <input type="checkbox" name=" experience UI" id="UI">User Interface<br>
                        <input type="checkbox" name="experience 2D" id="2D">2D sketching<br>
                        <input type="checkbox" name="experience 3D" id="3D">3D modelling<br>
                        <input type="checkbox" name="experience Assemblies" id="Assemblies">Assemblies<br>
                        <input type="checkbox" name="experience ExpV" id="ExpV">Exploded view<br>
                        <input type="checkbox" name="experience DrawF" id="DrawF">Drawing features<br>
                        <input type="checkbox" name="experience Excel" id="Excel">Excel link<br>
                        <input type="checkbox" name="experience FEM" id="FEM">FEM analysis<br>
                        <input type="checkbox" name="experience InventorS" id="InventorS">Inventor studio<br>
                        <input type="checkbox" name="experience SheetM" id="SheetM">Sheet metal<br>
                        <input type="checkbox" name="experience PlasticP" id="PlasticP">Plastic parts<br>
                        <input type="checkbox" name="experience Frames" id="Frames">Frames<br>
                        <input type="checkbox" name="experience Welding" id="Welding">Welding<br>
                        <input type="checkbox" name="experience SurfaceM" id="SurfaceM">Surface modelling<br>
                        <input type="checkbox" name="experience MoldD" id="MoldD">Mold design<br>
                        <input type="checkbox" name="experience FlowS" id="FlowS">Flow simulation<br>
                        <input type="checkbox" name="experience MoldR" id="MoldR">Mold representation<br>
                        <input type="checkbox" name="experience iParts" id="iParts">iParts<br>
                        <input type="checkbox" name="experience iAssemblies" id="iAssemblies">iAssemblies<br>
                        <input type="checkbox" name="experience Other" id="Other">Other (fill in)<br>
                        <input type="text" class="fullwidth-text-input" name="experience Other" id="OtherT"><br></p>


                    <p>TOPICS I AM MOSTLY INTERESTED IN:<br>
                        <input type="checkbox" name="interests UI" id="UI2">User Interface<br>
                        <input type="checkbox" name="interests 2D" id="2D2">2D sketching<br>
                        <input type="checkbox" name="interests 3D" id="3D2">3D modelling<br>
                        <input type="checkbox" name="interests Assemblies" id="Assemblies2">Assemblies<br>
                        <input type="checkbox" name="interests ExpV" id="ExpV2">Exploded view<br>
                        <input type="checkbox" name="interests DrawF" id="DrawF2">Drawing features<br>
                        <input type="checkbox" name="interests Excel" id="Excel2">Excel link<br>
                        <input type="checkbox" name="interests FEM" id="FEM2">FEM analysis<br>
                        <input type="checkbox" name="interests InventorS" id="InventorS2">Inventor studio<br>
                        <input type="checkbox" name="interests SheetM" id="SheetM2">Sheet metal<br>
                        <input type="checkbox" name="interests PlasticP" id="PlasticP2">Plastic parts<br>
                        <input type="checkbox" name="interests Frames" id="Frames2">Frames<br>
                        <input type="checkbox" name="interests Welding" id="Welding2">Welding<br>
                        <input type="checkbox" name="interests SurfaceM" id="SurfaceM2">Surface modelling<br>
                        <input type="checkbox" name="interests MoldD" id="MoldD2">Mold design<br>
                        <input type="checkbox" name="interests FlowS" id="FlowS2">Flow simulation<br>
                        <input type="checkbox" name="interests MoldR" id="MoldR2">Mold representation<br>
                        <input type="checkbox" name="interests iParts" id="iParts2">iParts<br>
                        <input type="checkbox" name="interests iAssemblies" id="iAssemblies2">iAssemblies<br>
                        <input type="checkbox" name="interests Other" id="Other2">Other (fill in)<br>
                        <input type="text" class="fullwidth-text-input" name="interests OtherT" id="OtherT2"><br></p>


                    <p>COURSE LEVEL:<br>
                        <input type="radio" name="course-level" id="select-level" value="level-beginner">Beginner<br>
                        <input type="radio" name="course-level" id="select-level" value="level-advanced">Advanced<br>
                    </p>

                    <label for="exp" id="expL">EXPECTATIONS:</label><br>
                    <input type="text" class="fullwidth-text-input" name="expectations" id="exp"><br>
                    <label id="expL2"> Write a few sentences on what are your expectations for this course, why you want to learn Inventor and what is motivating you the most. </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>