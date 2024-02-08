@extends('settings.page', [
    'section' => 'account',
    'title' => __('Account'),
])

@section('main')
    <div class="row">
        <div class="col-xxl-6">
            <h4>{{ __('Change Username') }}</h4>
            <h4>{{ __('Change Email Address') }}</h4>
            <x-form :action="route('settings.email.update', auth()->user())" method="put">
                <x-input.email :model="auth()->user()" :disabled="true" :label="__('Current Email')" />
                <x-input.email :model="auth()->user()" attribute="email" :disabled="true" />
                <x-input.email :model="auth()->user()" attribute="email_confirmed" :disabled="true" />
                <x-form-actions :requiredFields="true" />
            </x-form>
            <h4>Change Password</h4>
            <p>Current Password</p>
            <p>Forgot password?</p>
            <p>New Password</p>
            <p>Confirm new password</p>
            <p>recaptcha</p>
            <h4>Security</h4>
            <p>Logout Everwhere</p>
            <p>This will log you out of all clients</p>
            <h4>Manage Your Data</h4>
            <h5>Delete account</h5>
            <p class="alert alert-warning">
                <b>PLEASE NOTE:</b> Deletion of your account will take 14 days to complete. After this time, your account will be either
                deleted, anonymised or put beyond use and cannot be recovered. Please note that once your account is deleted you will not be
                able to register a new account with your existing username.
            </p>
        </div>
    </div>
@endsection
