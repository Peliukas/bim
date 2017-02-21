<div class="col-md-12">
    <div class="list-group">
        <div class="list-group-item disabled small-panel-heading">
            When you want to attend?
        </div>
        <div class="list-group-item">
            <form action="{{ url('/update-revit-info') }}" method="post">
                {{ csrf_field() }}
                <input type="radio" name="which-days" id="select-days" value="mon-we" {{ ($choices['which-days'] == 'mon-we') ? 'checked="checked"' : ''  }}>Monday and Wednesday<br>
                <input type="radio" name="which-days" id="select-days" value="tue-thur" {{ ($choices['which-days'] == 'tue-thur') ? 'checked="checked"' : ''  }}>Tuesday and Thursday<br>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>