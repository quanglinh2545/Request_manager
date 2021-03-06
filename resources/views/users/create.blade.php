@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create user') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_user') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{--department --}}
                        <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <select class="col-md-5 control-label form-control" name="department_id" id="department_id" required>
                                    @foreach($dpms as $dpm)
                                    <option value="{{ $dpm->id }}">{{ $dpm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- --}}
                        {{--role --}}
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select class="col-md-5 control-label form-control" name="role" id="role" required>
                                    @foreach($roles as $role)
                                    @if($role->slug != "admin") 
                                    <option value="{{ $role->id }}">{{ $role->slug }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- --}}
                        <div class="col-md-8">
                            &emsp;
                        </div>
                        <div class="col-md-8">
                            <div class="form-group row mb-4">
                                <div class="col-md-10 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <a href="{{ route('list_users') }}" class="btn btn-secondary"> Back</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

