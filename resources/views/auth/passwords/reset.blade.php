@extends('layouts.prompt', [
    'pageTitle' => __('Reset Password'),
])

@section('title')
    {{ __('Reset Password') }}
@endsection

@section('main')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group row">
            <label for="email" class="md:col-span-1 col-form-label md:text-right">{{ __('E-Mail Address') }}</label>
            <div class="md:col-7">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                       placeholder="{{ __('E-Mail Address') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="md:col-span-1 col-form-label md:text-right">{{ __('Password') }}</label>
            <div class="md:col-7">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                       placeholder="{{ __('Password') }}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="md:col-span-1 col-form-label md:text-right">{{ __('Confirm Password') }}</label>
            <div class="md:col-7">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                       placeholder="{{ __('Confirm Password') }}">
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="md:col-7 md:offset-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
@endsection
