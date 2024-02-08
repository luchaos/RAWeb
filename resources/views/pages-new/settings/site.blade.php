@extends('settings.page', [
    'section' => 'site',
    'title' => __('Site'),
])

@section('main')
    <div class="2xl:grid grid-flow-col gap-4">
        <div class="2xl:col-6">
            <h4 class="mb-3">{{ __('Site Preferences') }}</h4>
            <x-form :action="route('settings.profile.update')" method="put">
                <x-input.select
                    attribute="timezone"
                    :model="auth()->user()"
                    :options="collect(config('app.timezones'))"
                />
                <x-input.select
                    attribute="locale"
                    :model="auth()->user()"
                    :options="collect(config('app.locales'))"
                />
                <x-input.select
                    attribute="locale_date"
                    :model="auth()->user()"
                    :options="collect(config('app.locales'))"
                    help="{!! localized_date() !!}"
                />
                {{--help="{!! localized_date(null, null, IntlDateFormatter::MEDIUM, IntlDateFormatter::MEDIUM).'<br>'.localized_date(null, null, IntlDateFormatter::SHORT, IntlDateFormatter::SHORT) !!}"--}}
                <x-input.select
                    attribute="locale_number"
                    :model="auth()->user()"
                    :options="collect(config('app.locales'))"
                    :help="localized_number(123456.123)"
                />
                <x-form-actions />
            </x-form>
        </div>
        <div class="2xl:col-6">
            <h4 class="mb-3">{{ __('Appearance') }}</h4>
            <x-form-field label="Theme">
                <x-settings.theme-select :sm="false" />
            </x-form-field>
            <x-form-field label="Logo" help="Note: on small screens only the new logo will be used">
                <x-settings.logo-select :sm="false" />
            </x-form-field>
        </div>
        <div class="lg:col-6">
        </div>
    </div>
@endsection
