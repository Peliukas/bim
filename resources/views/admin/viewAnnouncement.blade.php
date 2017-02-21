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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/edit-announcement') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $announcement->id }}">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit announcement</h4>
                                </div>
                                <div class="modal-body">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $announcement->title }}">
                                    <label for="tinyMCE">Announcement</label>
                                    <textarea id="tinyMCE" name="text" class="form-control">{{ $announcement->text }}</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
