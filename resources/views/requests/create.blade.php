@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tạo mới request </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('store_request') }}">
                        {{ csrf_field() }}
                        {{-- title --}}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-3 control-label">Tiêu đề</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- description --}}
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-3 control-label">Nội dung</label>
                            <div class="col-md-9">
                                <textarea name="description" id="description" cols="30" rows="8" class="form-control" required>{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- category --}}
                        <div class="form-group row">
                            <label for="category_id" class="col-md-3 control-label">Category</label>
                            <div class="col-md-9">
                                <select class="col-md-3 control-label form-control" name="category_id" id="category_id" required>
                                    @foreach(\App\Models\Category::pluck('name', 'id')->toArray() as $key => $value)
                                    <option value="{{ $key }}" {{ ((old('category_id') ?? $rq->category_id ?? 0) == $key) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- manager --}}
                        <div class="form-group">
                            <label for="category_id" class="col-md-3 control-label">Manager</label>
                            <div class="col-md-9">
                                <select class="col-md-3 control-label form-control" name="manager" id="manager" required>
                                    @foreach($managers as $manager)
                                    <option value="{{ $manager->name }}" {{ ((old('manager') ?? $rq->category_id ?? 0) == $key) ? 'selected' : '' }}>{{ $manager->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- start time --}}
                        <div class="form-group">
                            <label for="start_date" class="col-md-3 control-label">Start date</label>
                            <div class="col-md-9">
                                <input id="start_date" type="datetime-local" class="col-md-3 control-label form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>
                            </div>
                        </div>
                        {{-- --}}
                         {{-- due dâte --}}
                        <div class="form-group">
                            <label for="due_date" class="col-md-3 control-label">Due date</label>
                            <div class="col-md-9">
                                <input id="due_date" type="datetime-local" class="col-md-3 control-label form-control" name="due_date" value="{{ old('due_date') }}" required autofocus>
                            </div>
                        </div>
                        {{-- --}}
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    Tạo request
                                </button>
                                <a href="{{ route('list_requests') }}" class="btn btn-success">
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

