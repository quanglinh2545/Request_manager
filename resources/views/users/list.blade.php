@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($users as $user)
        <div class="col-md-4">
            <h2>{{\Illuminate\Support\Str::limit($user->name, 50) }}</h2>
            <p>{{ \Illuminate\Support\Str::limit($user->email, 100) }}</p>
            <p><a class="btn btn-default" href=" {{route ('edit_user',$user->id )}}" role="button">Chi tiết »</a></p>
        </div>
        @endforeach
    </div>
</div>
@endsection