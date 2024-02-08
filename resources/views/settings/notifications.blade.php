@extends('settings.page', [
    'section' => 'notifications',
    'title' => __('Notification'),
])

@section('main')
    <div class="row">
        <div class="col-xxl-6">
            <form action="{{ route('settings.notifications.update') }}" method="post">
                @method('put')
                @csrf
                <table class="table table-striped table-hover table-sm">
                    <thead>
                    <tr>
                        <td></td>
                        <td class="text-center">Email</td>
                        <td class="text-center">Site Notification</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Comments on my activity</td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input
                                    type="checkbox"
                                    class="custom-control-input" id="notifications[activity][email]"
                                    name="notifications[activity][email]"
                                    value="1"
                                    {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::EmailOnActivityComment) ? 'checked' : '' }}
                                >
                            </div>
                        </td>
                        <td class="text-center">
                            <input
                                id="UserPref8"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::SiteMsgOnActivityComment) ? 'checked' : '' }}
                            >
                        </td>
                    </tr>
                    <tr>
                        <td>Comments on an achievement I created</td>
                        <td class="text-center">
                            <input
                                id="UserPref1"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::EmailOnAchievementComment) ? 'checked' : '' }}
                            >
                        </td>
                        <td class="text-center">
                            <input
                                id="UserPref9"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::SiteMsgOnAchievementComment) ? 'checked' : '' }}
                            >
                        </td>
                    </tr>
                    <tr>
                        <td>Comments on my profile</td>
                        <td class="text-center">
                            <input
                                id="UserPref2"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::EmailOnUserWallComment) ? 'checked' : '' }}
                            >
                        </td>
                        <td class="text-center">
                            <input
                                id="UserPref10"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::SiteMsgOnUserWallComment) ? 'checked' : '' }}
                            >
                        </td>
                    </tr>
                    <tr>
                        <td>Comments in a forum topic I'm involved in</td>
                        <td class="text-center">
                            <input
                                id="UserPref3"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::EmailOnForumReply) ? 'checked' : '' }}
                            >
                        </td>
                        <td class="text-center">
                            <input
                                id="UserPref11"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::SiteMsgOnForumReply) ? 'checked' : '' }}
                            >
                        </td>
                    </tr>
                    <tr>
                        <td>Someone adds me as a friend</td>
                        <td class="text-center">
                            <input
                                id="UserPref4"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::EmailOnAddFriend) ? 'checked' : '' }}
                            >
                        </td>
                        <td class="text-center">
                            <input
                                id="UserPref12"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::SiteMsgOnAddFriend) ? 'checked' : '' }}
                            >
                        </td>
                    </tr>
                    <tr>
                        <td>Private message received</td>
                        <td class="text-center">
                            <input
                                id="UserPref5"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;"
                                value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\NotificationPreferences::EmailOnPrivateMessage) ? 'checked' : '' }}
                            >
                        </td>
                        <td class="text-center">
                            <input
                                id="UserPref13"
                                type="checkbox"
                                onchange="DoChangeUserPrefs(); return false;" value="1"
                                disabled
                                checked
                            >
                        </td>
                    </tr>
                    {{--<tr>--}}
                    {{--<td>Weekly RA Newsletter arrives</td>--}}
                    {{--<td>--}}
                    {{--<input id="UserPref6" type="checkbox" onchange="DoChangeUserPrefs(); return false;"--}}
                    {{--value="1" {{ bit_value(auth()->user()->preferences, \App\Domain\Site\Models\Notifications::EmailOn_Newsletter) ? 'checked' : '' }}>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<input id="UserPref14" type="checkbox" onchange="DoChangeUserPrefs(); return false;" value="1"--}}
                    {{--disabled>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
