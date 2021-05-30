@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cập nhật request</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('update_request', ['rq' => $rq]) }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    Cập nhật
                                </button>
                                @can('post.accept')
                                <a href="{{ route('accept_request', ['rq' => $rq]) }}" class="btn btn-success">
                                    Xuất bản
                                </a>
                                @endcan
                                <a href="{{ route('list_requests') }}" class="btn btn-default">
                                    Hủy bỏ
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection