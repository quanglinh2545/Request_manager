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
                    {{--  --}}
                     <hr />
                      <br /> <br> <br /> <br>
                     <h3>Comments</h3>
  
                    @include('requests.commentsDisplay', ['comments' => $rq->comments, 'rq_id' => $rq->id])
   
                    <hr />
                       @can('request.manager')
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('store_comment') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name=body></textarea>
                            <input type=hidden name=request_model_id value="{{ $rq->id }}" />
                        </div>
                        <div class="form-group">
                            <input type=submit class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                    @endcan
                    {{--  --}}
                </div>
            </div>
            @can('request.manager')
            <a href = "{{ route('approve_request', $rq->id) }} "class="btn btn-success"> Approve </a>
            <a href="{{ route('reject_request', $rq->id) }}" class="btn btn-danger"> Reject</a>
            @endcan
            @can('request.admin')
            
            @endcan
             <a class="btn btn-secondary" href="{{ route('list_drafts') }}" role="button">Back</a>
        </div>

    </div>
</div>

@endsection

{{-- <div class="col-md-12">
            <h2>{{ $rq->title }}</h2>

<p>{{ $rq->description }}</p>
</div> --}}

