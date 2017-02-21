<div class="col-md-12">
    <div class="list-group">
        <div class="list-group-item disabled small-panel-heading">
            My Course Level
        </div>
        <div class="list-group-item">
            <form action="{{ url('/update-inventor-info') }}" method="post">
                {{ csrf_field() }}
                <input type="radio" name="course-level" id="select-level" value="level-beginner"  {{ ($choices['course-level'] == 'level-beginner') ? 'checked="checked"' : ''  }}>Beginner<br>
                <input type="radio" name="course-level" id="select-level" value="level-advanced"  {{ ($choices['course-level'] == 'level-advanced') ? 'checked="checked"' : ''  }}>Advanced<br>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>