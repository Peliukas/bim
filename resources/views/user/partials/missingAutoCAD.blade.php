<div class="modal fade" id="missingAutoCADApplication" tabindex="-1" role="dialog" aria-labelledby="missingAutoCADApplication">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/missing-course/4') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    AutoCAD course application
                </div>
                <div class="modal-body">
                    <p><label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH AutoCAD:</label><br>
                        <input id="yrs" class="fullwidth-text-input" name="experience" type="text"><br></p>

                    <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                        <input id="software" class="fullwidth-text-input" name="software" type="text"><br></p>

                    <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                        <input type="checkbox" name="experience UI" id="UI">User Interface<br>
                        <input type="checkbox" name="experience DrawE" id="DrawE">Drawing entities<br>
                        <input type="checkbox" name="experience EditF" id="EditF">Editing features<br>
                        <input type="checkbox" name="experience Mod" id="Mod">Modifying<br>
                        <input type="checkbox" name="experience Layers" id="Layers">Layers<br>
                        <input type="checkbox" name="experience Prop" id="Prop">Properties<br>
                        <input type="checkbox" name="experience Blocks" id="Blocks">Blocks<br>
                        <input type="checkbox" name="experience Groups" id="Groups">Groups<br>
                        <input type="checkbox" name="experience Param" id="Param">Parametric<br>
                        <input type="checkbox" name="experience Dimen" id="Dimen">Dimensioning<br>
                        <input type="checkbox" name="experience Cust" id="Cust">Customizing<br>
                        <input type="checkbox" name="experience Layouts" id="Layouts">Layouts<br>
                        <input type="checkbox" name="experience Prints" id="Prints">Prints<br>
                        <input type="checkbox" name="experience Exports" id="Exports">Exports<br>
                        <input type="checkbox" name="experience Other" id="Other">Other (fill in)<br>
                        <input type="text" class="fullwidth-text-input" name="experience Other" id="OtherT"><br></p>


                    <p>TOPICS I AM MOSTLY INTERESTED IN:<br>
                        <input type="checkbox" name="interests UI2" id="UI2">User Interface<br>
                        <input type="checkbox" name="interests DrawE2" id="DrawE2">Drawing entities<br>
                        <input type="checkbox" name="interests EditF2" id="EditF2">Editing features<br>
                        <input type="checkbox" name="interests Mod2" id="Mod2">Modifying<br>
                        <input type="checkbox" name="interests Layers2" id="Layers2">Layers<br>
                        <input type="checkbox" name="interests Prop2" id="Prop2">Properties<br>
                        <input type="checkbox" name="interests Blocks2" id="Blocks2">Blocks<br>
                        <input type="checkbox" name="interests Groups2" id="Groups2">Groups<br>
                        <input type="checkbox" name="interests Param2" id="Param2">Parametric<br>
                        <input type="checkbox" name="interests Dimen2" id="Dimen2">Dimensioning<br>
                        <input type="checkbox" name="interests Cust2" id="Cust2">Customizing<br>
                        <input type="checkbox" name="interests Layouts2" id="Layouts2">Layouts<br>
                        <input type="checkbox" name="interests Prints2" id="Prints2">Prints<br>
                        <input type="checkbox" name="interests Exports2" id="Exports2">Exports<br>
                        <input type="checkbox" name="interests Other2" id="Other2">Other (fill in)<br>
                        <input type="text" class="fullwidth-text-input" name="interests Other2" id="OtherT2"><br></p>

                    <label for="exp" id="expL">EXPECTATIONS:</label><br>
                    <input type="text" class="fullwidth-text-input" name="expectations" id="exp"><br>
                    <label id="expL2"> Write a few sentences on what are your expectations for this course, why you want to learn AutoCAD and what is motivating you the most. </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>