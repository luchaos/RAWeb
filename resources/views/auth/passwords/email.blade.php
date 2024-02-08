@extends('layouts.prompt', [
    'pageTitle' => __('Reset Password'),
])

@section('title')
    {{ __('Reset Password') }}
@endsection

@section('main')
    <x-section>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="md:col-span-1 col-form-label md:text-right">{{ __('E-Mail Address') }}</label>
                <div class="md:col-7">
                    <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="md:col-6 md:offset-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </x-section>
@endsection
