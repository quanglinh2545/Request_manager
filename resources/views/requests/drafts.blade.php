@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($rqs as $rq)
        <div class="col-md-4">
            <h2>{{ \Illuminate\Support\Str::limit($rq->title,6) }}</h2>
            <p>{{  \Illuminate\Support\Str::limit($rq->description, 100) }}</p>
            <p>
                <a class="btn btn-success" href="{{ route('edit_request', ['rq' => $rq]) }}" role="button">Chỉnh sửa</a>
               @can('request.accept')
                    <a class="btn btn-success" href="{{ route('accept_request', ['rq' => $rq]) }}" role="button">accept</a>
                @endcan
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection