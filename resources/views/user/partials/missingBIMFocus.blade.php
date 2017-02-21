<div class="modal fade" id="missingBIMFocusApplication" tabindex="-1" role="dialog" aria-labelledby="missingBIMFocusApplication">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/missing-course/6') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    BIM Focus course application
                </div>
                <div class="modal-body">
                    <p><label for="yrs" id="yrsL">YEARS OF EXPERIENCE:</label><br>
                        <input id="yrs" class="fullwidth-text-input"  name="bimfocu" type="text"><br></p>

                    <p><label for="software" id="softwareL">SIMILAR SOFTWARE KNOWN:</label><br>
                        <input id="software" name="experience" type="text" class="fullwidth-text-input"><br></p>

                    <p>TOPICS I HAVE EXPERIENCE WITH:<br>
                        <input type="checkbox" name="experience User Interface" id="UI">User Interface<br>
                        <input type="checkbox" name="experience Template" id="Template">Template<br>
                        <input type="checkbox" name="experience levels grids" id="Levels">Levels, grids<br>
                        <input type="checkbox" name="experience Parameters" id="Parameters">Parameters<br>
                        <input type="checkbox" name="experience Walls and foundations" id="Walls">Walls and foundations<br>
                        <input type="checkbox" name="experience Curtain walls" id="CWalls">Curtain walls<br>
                        <input type="checkbox" name="experience Openings" id="Openings">Openings<br>
                        <input type="checkbox" name="experience Floors and Ceilings" id="Floors">Floors and Ceilings<br>
                        <input type="checkbox" name="experience Roofs" id="Roofs">Roofs<br>
                        <input type="checkbox" name="experience Staircases and railings" id="Staircases">Staircases and railings<br>
                        <input type="checkbox" name="experience Site" id="Site">Site<br>
                        <input type="checkbox" name="experience Import and export" id="ImpExp">Import and export<br>
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
                        <input type="text" name="experience Other" id="OtherT" class="fullwidth-text-input"><br></p>
                    <br>

                    <p>TOPICS I AM MOSTLY INTERESTED IN IN REVIT:<br>
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
                        <input type="text" name="interests Other2" id="OtherT2" class="fullwidth-text-input"><br></p>
                    <br>

                    <p>TOPICS I AM FAMILIAR WITH IN BIM FIELD:<br>
                        <input type="checkbox" name="experience Th" id="Th">Theory<br>
                        <input type="checkbox" name="experience BIMint" id="BIMint">BIM integration<br>
                        <input type="checkbox" name="experience ITinf" id="ITinf">IT infrastructure (Computer knowledge)<br>
                        <input type="checkbox" name="experience BIMstandards" id="BIMstandards">BIM standards<br>
                        <input type="checkbox" name="experience Libraries" id="Libraries">Libraries<br>
                        <input type="checkbox" name="experience FileTypes" id="FileTypes">File types<br>
                        <input type="checkbox" name="experience ProjectStr" id="ProjectStr">Project structure<br>
                        <input type="checkbox" name="experience DataExchangeF" id="DataExchangeF">Data exchange formats<br>
                        <input type="checkbox" name="experience DocumentWork" id="DocumentWork">Document workflows<br>
                        <input type="checkbox" name="experience ModelingStrat" id="ModelingStrat">Modeling strategies<br>
                        <input type="checkbox" name="experience ResearchDevBIM" id="ResearchDevBIM">Research and development of BIM<br>
                        <input type="checkbox" name="experience Coordination" id="Coordination">Coordination<br>
                        <input type="checkbox" name="experience ClashDet" id="ClashDet">Clash detection<br>
                        <input type="checkbox" name="experience Other3" id="Other3">Other (fill in)<br>
                        <input type="text" name="experience Other3" id="OtherT3" class="fullwidth-text-input"><br></p>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>