<div class="modal fade" id="missingRobotApplication" tabindex="-1" role="dialog" aria-labelledby="missingRobotApplication">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/missing-course/7') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    Robot course application
                </div>
                <div class="modal-body">
                    <p><label for="yrs" id="yrsL">YEARS OF EXPERIENCE WITH ROBOT:</label><br>
                        <input id="yrs" class="fullwidth-text-input" name="experience" type="text"><br></p>

                    <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                        <input id="software" name="software" type="text" class="fullwidth-text-input"><br></p>

                    <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                        <input type="checkbox" name="experience UI" id="UI">User Interface<br>
                        <input type="checkbox" name="experience Workflow" id="Workflow">Workflow<br>
                        <input type="checkbox" name="experience StrucM" id="StrucM">Structure modeling<br>
                        <input type="checkbox" name="experience Loads" id="Loads">Loads<br>
                        <input type="checkbox" name="experience Analysis" id="Analysis">Analysis<br>
                        <input type="checkbox" name="experience Results" id="Results">Results<br>
                        <input type="checkbox" name="experience SteelD" id="SteelD">Steel design<br>
                        <input type="checkbox" name="experience TimberD" id="TimberD">Timber design<br>
                        <input type="checkbox" name="experience SteelC" id="SteelC">Steel connections<br>
                        <input type="checkbox" name="experience Reinf" id="Reinf">Reinforced concrete design<br>
                        <input type="checkbox" name="experience Printouts" id="Printouts">Printouts<br>
                        <input type="checkbox" name="experience Reports" id="Reports">Reports<br>
                        <input type="checkbox" name="experience Other" id="Other">Other (fill in)<br>
                        <input type="text" name="experience OtherT" id="OtherT" class="fullwidth-text-input"><br></p>


                    <p>TOPICS I AM MOSTLY INTERESTED IN:<br>
                        <input type="checkbox" name="interests UI" id="UI2">User Interface<br>
                        <input type="checkbox" name="interests Workflow" id="Workflow2">Workflow<br>
                        <input type="checkbox" name="interests StrucM" id="StrucM2">Structure modeling<br>
                        <input type="checkbox" name="interests Loads" id="Loads2">Loads<br>
                        <input type="checkbox" name="interests Analysis" id="Analysis2">Analysis<br>
                        <input type="checkbox" name="interests Results" id="Results2">Results<br>
                        <input type="checkbox" name="interests SteelD" id="SteelD2">Steel design<br>
                        <input type="checkbox" name="interests TimberD" id="TimberD2">Timber design<br>
                        <input type="checkbox" name="interests SteelC" id="SteelC2">Steel connections<br>
                        <input type="checkbox" name="interests Reinf" id="Reinf2">Reinforced concrete design<br>
                        <input type="checkbox" name="interests Printouts" id="Printouts2">Printouts<br>
                        <input type="checkbox" name="interests Reports" id="Reports2">Reports<br>
                        <input type="checkbox" name="interests Other" id="Other2">Other (fill in)<br>
                        <input type="text" name="interests OtherT" id="OtherT2" class="fullwidth-text-input"><br></p>

                    <label for="exp" id="expL">EXPECTATIONS:</label><br>
                    <input type="text" name="expectations" id="exp" class="fullwidth-text-input"><br>
                    <label id="expL2"> Write a few sentences on what are your expectations for this course, why you want to learn Robot and what is motivating you the most. </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>