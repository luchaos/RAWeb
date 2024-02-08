@extends('settings.page', [
    'section' => 'profile',
    'title' => __('Profile'),
])

@section('main')
    <?php
    // $rules = collect((new RA\Account\Requests\Settings\UpdateProfileRequest())->rules());
    //
    // $parsedRules = collect($rules)->map(function ($rule) {
    //     return collect($rule)
    //         ->mapWithKeys(function ($value, $key) {
    //             $rules = explode('|', $value);
    //             $text = '';
    //             var_dump($rules);
    //             foreach ($rules as $ruleDef) {
    //                 $ruleParams = explode(':', $ruleDef);
    //                 $ruleKey = array_shift($ruleParams);
    //                 $text .= $ruleKey;
    //                 foreach ($ruleParams as $ruleParam) {
    //                     switch ($ruleKey) {
    //                         case 'image':
    //                             $key = 'type';
    //                             break;
    //                         case 'max':
    //                             $key = 'maxSize';
    //                             break;
    //
    //                     };
    //                 }
    //             }
    //
    //             return [$key => $text];
    //         });
    // });
    // var_dump($parsedRules);
    ?>
    <div class="2xl:grid grid-flow-col gap-4">
        <div class="2xl:col-6">
            <x-section>
                <x-section-header>
                    <x-slot name="title"><h4>{{ __('Avatar') }}</h4></x-slot>
                    <x-slot name="actions">
                        @if(auth()->user()->hasMedia('avatar'))
                            <x-button.delete
                                class="btn btn-outline-danger"
                                resource="avatar"
                                ability="deleteAvatar"
                                :model="auth()->user()"
                                :link="route('user.avatar.destroy', auth()->user())"
                            >
                                {{ __('Delete :resource', ['resource' => __($label ?? 'validation.attributes.avatar')]) }}
                            </x-button.delete>
                        @endif
                    </x-slot>
                </x-section-header>
                <x-form :action="route('settings.profile.update')" method="put">
                    <x-input.image
                        :model="auth()->user()" attribute="avatar"
                        :showOriginal="request()->user()->can('root')"
                        help="Max 2MB; Max 4500px; Type PNG, JPEG, GIF, SVG"
                    />
                    <x-form-actions />
                </x-form>
            </x-section>
        </div>
        <div class="2xl:col-6">
            @if (auth()->user()->email_verified_at)
                <x-form :action="route('settings.profile.update')" method="put">
                    <h4>{{ __('About Me') }}</h4>
                    {{-- TODO: build username change --}}
                    <x-input.text :model="auth()->user()" attribute="username"
                                  disabled />
                    {{--help="Username has to be unique, between x and y characters long and may not contain special characters"--}}
                    <x-input.text :model="auth()->user()" attribute="motto" help="Tell others what you're up to" />

                    <x-input.select
                        attribute="country"
                        :model="auth()->user()"
                        :options="collect(Symfony\Component\Intl\Countries::getNames(auth()->user()->locale))"
                    />
                    <x-form-actions />
                </x-form>
            @endif

            {{--<x-form :action="route('settings.profile.update')" method="put">
                <h4>{{ __('Display Preferences') }}</h4>
                <x-form-actions/>
            </x-form>--}}
        </div>
        <div class="lg:col-6">
        </div>
    </div>
@endsection
