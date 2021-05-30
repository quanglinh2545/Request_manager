@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($rqs as $rq)
        <div class="col-md-4">
            <h2>{{\Illuminate\Support\Str::limit($rq->title, 50) }}</h2>
            <p>{{ \Illuminate\Support\Str::limit($rq->description, 100) }}</p>
            <p><a class="btn btn-default" href="{{ route('show_request', ['id' => $rq->id]) }}" role="button">Chi tiết »</a></p>
        </div>
        @endforeach
    </div>
</div>
@endsection