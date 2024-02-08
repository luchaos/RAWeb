<x-prompt-layout
    :page-title="__('Forgot password')"
>
    <x-slot name="header">
        <h1 class="text-h4 mb-0">{{ __('Forgot password') }}</h1>
    </x-slot>

    <div class="mb-4">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 text-green-500">
            {{ session('status') }}
        </div>
    @endif

    <x-form :action="route('password.email')">
        <x-input.text attribute="User" required autofocus autocomplete="username" />
        <x-button type="submit" class="w-full text-center py-2">
            {{ __('Email Password Reset Link') }}
        </x-button>
    </x-form>
</x-prompt-layout>
