@extends('layouts.prompt', [
    'pageTitle' => __('Register'),
])

@section('title')
    {{ __('Register') }}
@endsection

@section('main')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="md:col-span-1 col-form-label md:text-right">{{ __('Username') }}</label>
            <div class="md:col-7">
                <input id="name" type="text" placeholder="{{ __('Username') }}"
                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                       name="username" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="md:col-span-1 col-form-label md:text-right">{{ __('E-Mail Address') }}</label>
            <div class="md:col-7">
                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="md:col-span-1 col-form-label md:text-right">{{ __('Password') }}</label>
            <div class="md:col-7">
                <input id="password" type="password" placeholder="{{ __('Password') }}"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="md:col-span-1 col-form-label md:text-right">{{ __('Confirm Password') }}</label>
            <div class="md:col-7">
                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}"
                       class="form-control" name="password_confirmation" required>
            </div>
        </div>
        @if (config('services.google.recaptcha_key'))
            <div class="form-group row">
                <label for="captcha" class="md:col-span-1 col-form-label md:text-right">{{ __('Are you a robot?') }}</label>
                <div class="md:col-6">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.google.recaptcha_key') }}"></div>
                </div>
            </div>
        @endif
        <div class="form-group row mb-0">
            <div class="md:col-6 md:offset-4">
                <p class="mb-3">
                    By submitting this form, you agree to the <a href="{{ route('terms') }}" target="_blank">Terms and Conditions</a>.
                </p>
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    @if (config('services.google.recaptcha_key'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
@endpush
