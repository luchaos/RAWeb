<x-prompt-layout
    :page-title="__('Login')"
>
    <x-slot name="header">
        <h1 class="text-h4 mb-0">{{ __('Sign in to RetroAchievements') }}</h1>
    </x-slot>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-500">
            {{ session('status') }}
        </div>
    @endif

    <x-form :action="route('login')">
        <x-input.text attribute="username" required />
        <x-input.password attribute="password" required />
        <x-input.checkbox attribute="remember" :label="__('Remember Me')" />
        <x-button type="submit" class="w-full text-center py-2 mb-4">{{ __('Sign in') }}</x-button>
        <div class="flex flex-col justify-between">
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            <a class="btn btn-link" href="{{ route('register') }}">
                {{ __('Sign up') }}
            </a>
        </div>
    </x-form>
</x-prompt-layout>
