<div class="col-md-6" style="padding: 15px;">
    <div class="list-group">
        <a href="#" class="list-group-item disabled small-panel-heading">
            Mondays - Wednesdays
        </a>
        @if(isset($mon_we))
            @foreach($mon_we as $e)
                <div  class="list-group-item" target="_blank">

                    <a href="{{ url('/teacher/view-student') . '/' . $e->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                        {{$e->name . ' ' . $e->surname}}
                    </a>
                    <a href="{{ url('/teacher/remove-student') . '-' . $e->id . '/' . $course->id }}" onclick="return confirm('Are you sure?')" style="float: right;">Remove</a>
                </div>
            @endforeach
        @else
            No students
        @endif
        <a href="#" class="list-group-item disabled small-panel-heading">
            Tuesday - Thursday
        </a>
        @if(isset($tue_thur))
            @foreach($tue_thur as $e)
                <div  class="list-group-item" target="_blank">

                    <a href="{{ url('/teacher/view-student') . '/' . $e->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                        {{$e->name . ' ' . $e->surname}}
                    </a>
                    <a href="{{ url('/teacher/remove-student') . '-' . $e->id . '/' . $course->id }}" onclick="return confirm('Are you sure?')" style="float: right;">Remove</a>
                </div>
            @endforeach
        @else
            No students
        @endif
        @if(isset($unsigned))
            <a href="#" class="list-group-item disabled small-panel-heading">
                Not selected yet
            </a>
            @foreach($unsigned as $e)
                <div  class="list-group-item" target="_blank">

                    <a href="{{ url('/teacher/view-student') . '/' . $e->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                        {{$e->name . ' ' . $e->surname}}
                    </a>
                    <a href="{{ url('/teacher/remove-student') . '-' . $e->id . '/' . $course->id }}" onclick="return confirm('Are you sure?')" style="float: right;">Remove</a>
                </div>
            @endforeach
        @endif
    </div>
</div>