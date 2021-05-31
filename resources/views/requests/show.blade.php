@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Chi tiết</div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            <p>{{ $rq->title }}</p>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            <p>{{ $rq->description }}</p>
                        </div>
                    </div>

                    {{-- --}}
                    <div class="form-group">
                        <label class="col-md-3 control-label">User name</label>
                        <div class="col-md-9">
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Priority</label>
                        <div class="col-md-9">
                            <p>{{ $rq->priority }}</p>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <p>{{ $rq->status }}</p>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Start date</label>
                        <div class="col-md-9">
                            <p>{{ date('Y-m-d\TH:i', strtotime($rq->start_date)) }}</p>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Due date</label>
                        <div class="col-md-9">
                            <p>{{ date('Y-m-d\TH:i', strtotime($rq->due_date)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href = "{{ route('manage_request', $rq->id) }} "class="btn btn-success"> Approve </a>
            <a href="#" class="btn btn-default"> Reject</a>
        </div>

    </div>
</div>

@endsection

{{-- <div class="col-md-12">
            <h2>{{ $rq->title }}</h2>

<p>{{ $rq->description }}</p>
</div> --}}

