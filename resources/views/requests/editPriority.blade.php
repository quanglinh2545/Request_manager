@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Change Priority</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('update_priority', $rq->id) }}">
                        {{ csrf_field() }}

                        {{-- title --}}
                        <div class="form-group">
                            <label for="category_id" class="col-md-3 control-label">Priority</label>
                            <div class="col-md-9">
                                <select class="col-md-5 control-label form-control" name="priority" id="priority" required>
                                    @for($i = 0;$i<4;$i++)
                                    <option value="{{ $i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        {{-- --}}
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    Cập nhật
                                </button>
                                <a href="{{ route('list_drafts') }}" class="btn btn-default">
                                    Quay lại
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

