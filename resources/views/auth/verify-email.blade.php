<x-prompt-layout
    :page-title="__('Verify email')"
>
    <x-slot name="header">
        <h1 class="text-h4 mb-0">{{ __('Verify email') }}</h1>
    </x-slot>

    <div class="mb-4">
        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-green-500">
            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
        </div>
    @endif

    <x-form :action="route('verification.send')">
        <x-button type="submit" class="w-full text-center py-2 mb-4">
            {{ __('Resend Verification Email') }}
        </x-button>
    </x-form>
    <div class="flex flex-col justify-between">
        <a href="{{ route('settings', 'profile') }}" class="btn btn-link">
            {{ __('Profile settings') }}
        </a>
        <x-form :action="route('logout')">
            <x-button type="submit" class="btn btn-link">{{ __('Log Out') }}</x-button>
        </x-form>
    </div>
</x-prompt-layout>
