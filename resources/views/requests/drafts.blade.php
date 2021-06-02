@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($rqs as $rq)
        <div class="col-md-4">
            <h2>{{ \Illuminate\Support\Str::limit($rq->title,6) }}</h2>
            <p>{{  \Illuminate\Support\Str::limit($rq->description, 100) }}</p>
            <p>
                <a class="btn btn-success" href="{{ route('show_request', ['id' => $rq->id]) }}" role="button">Chi tiết</a>
                @can('request.user')
                <a class="btn btn-success" href="{{ route('edit_request', ['rq' => $rq]) }}" role="button">Chỉnh sửa</a>
                @endcan
                 @can('request.delete')
                    <a class="btn btn-danger" href="{{ route('delete_request',  ['rq' => $rq]) }}" role="button">Delete</a>
                @endcan
                @can('request.admin')
                <a class="btn btn-success" href="{{ route('edit_request', ['rq' => $rq]) }}" role="button">Chỉnh sửa</a>
                @endcan
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection