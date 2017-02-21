<div class="col-md-6" style="padding: 15px;">
    <div class="list-group">
        <a href="#" class="list-group-item disabled small-panel-heading">
            Beginners
        </a>
        @if(isset($beginners))
            @foreach($beginners as $e)
                <div  class="list-group-item" target="_blank">

                    <a href="{{ url('/admin/view-student') . '/' . $e->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                        {{$e->name . ' ' . $e->surname}}
                    </a>
                    <a href="{{ url('/admin/remove-student') . '-' . $e->id . '/' . $course->id }}" onclick="return confirm('Are you sure?')" style="float: right;">Remove</a>
                </div>
            @endforeach
        @else
            No students
        @endif
        <a href="#" class="list-group-item disabled small-panel-heading">
            Advanced
        </a>
        @if(isset($advanced))
            @foreach($advanced as $e)
                <div  class="list-group-item" target="_blank">

                    <a href="{{ url('/admin/view-student') . '/' . $e->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                        {{$e->name . ' ' . $e->surname}}
                    </a>
                    <a href="{{ url('/admin/remove-student') . '-' . $e->id . '/' . $course->id }}" onclick="return confirm('Are you sure?')" style="float: right;">Remove</a>
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

                    <a href="{{ url('/admin/view-student') . '/' . $e->id }}" onClick="window.open(this.href,'pagename','resizable,height=800,width=800'); return false;">
                        {{$e->name . ' ' . $e->surname}}
                    </a>
                    <a href="{{ url('/admin/remove-student') . '-' . $e->id . '/' . $course->id }}" onclick="return confirm('Are you sure?')" style="float: right;">Remove</a>
                </div>
            @endforeach
        @endif
    </div>
</div>