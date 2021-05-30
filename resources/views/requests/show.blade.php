@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $rq->title }}</h2>

            <p>{{ $rq->description }}</p>
        </div>
    </div>
</div>
@endsection