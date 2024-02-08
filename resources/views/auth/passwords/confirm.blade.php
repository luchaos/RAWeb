@extends('layouts.prompt', [
    'pageTitle' => __('Confirm Password'),
])

@section('title')
    {{ __('Confirm Password') }}
@endsection

@section('main')
    <x-section>
        <p>
            {{ __('Please confirm your password before continuing.') }}
            {{ __('We won\'t ask for your password again for a few hours.') }}
        </p>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="form-group row">
                <label for="password" class="md:col-3 col-form-label md:text-right">{{ __('Password') }}</label>
                <div class="md:col-span-2">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="md:col-9 md:offset-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirm Password') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </x-section>
@endsection
