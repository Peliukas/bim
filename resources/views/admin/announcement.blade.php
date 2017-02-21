@extends('../layouts.app')
@section('content')
    <div class="panel-heading apply-for-course-page-title">Announcements</div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">
                    <div class="panel-body">
                        @if(session('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif
                         <br>
                        <table class="table table-bordered text-center">
                            <tr>

                                <td class="small-panel-heading">Title</td>
                                <td class="small-panel-heading">Action</td>
                            </tr>
                            @foreach($announcements as $index => $announcement)
                                <tr>

                                    <td><b>{{ $announcement->title }}</b></td>
                                    <td>
                                        <a href="{{ url('/admin/announcement') . '/' . $announcement->id }}">
                                            <button type="button" class="btn btn-primary">
                                                View
                                            </button>
                                        </a>
                                        <a href="{{ url('/admin/delete-announcement') . '/' . $announcement->id }}">
                                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <button class="btn apply-for-course-btn" data-toggle="modal" style="float: right;" data-target="#newAnnouncement">Add announcement</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="newAnnouncement" tabindex="-1" role="dialog" aria-labelledby="newAnnouncement">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/post-announcement') }}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add new announcement</h4>
                    </div>
                    <div class="modal-body">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                        <label for="tinyMCE">Announcement</label>
                        <textarea id="tinyMCE" name="text" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
