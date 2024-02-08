@extends('settings.page', [
    'section' => 'connect',
    'title' => __('Connect'),
])

@section('main')
    <div class="row">
        <div class="col-xxl-6">
            <h4>Discord</h4>
            <h4>Twitch</h4>
            @if(config('services.twitch.streamer_key'))
                <div class="form-group row">
                    <label class="col-form-label col-lg-3 text-lg-right">
                        Twitch.tv Stream Key
                    </label>
                    <div class="col-lg-9">
                        <input readonly class="form-control disabled"
                               value="{{ config('services.twitch.streamer_key') }}">
                    </div>
                </div>
            @endif
            <h4>Twitter</h4>
            <h4>Facebook</h4>
            <?php
            /*
                    @if (auth()->user()->facebook_user_id)
                        <?php
                        $loggedIn = RenderFBDialog(auth()->user()->facebook_user_id, $fbRealName, $fbURL, auth()->user());
                        ?>
                        @if (auth()->user()->facebook_user_id !== 0)
                            <img class="float-right"
                                 src="http://graph.facebook.com/{{ auth()->user()->facebook_user_id }}/picture?type=square" width="50"
                                 height="50">
                            Logged in as:
                            <a href="{{ $fbURL }}">{{ $fbRealName }}</a><br>
                        @endif
                        @if ($errorCode == 'associateOK')
                            <div id="warning">Facebook associated OK, $fbRealName! Please confirm below what you would
                                prefer to have cross-posted to your facebook wall:
                            </div>
                        @endif
                        <br>
                        <h4>Facebook Preferences</h4>
                        When would you like RetroAchievements to automatically post on your Facebook wall?
                        <table>
                            <tbody>
                            <!--<tr><th>Action</th><th>Post on Facebook?</th></tr>-->
                            <tr>
                                <td>When I earn achievements:</td>
                                <td>
                                    <input id="FBUserPref0" type="checkbox" onchange="DoChangeFBUserPrefs(); return false;"
                                           value="1" {{ bit_value(auth()->user()->facebook_user_preferences, \RA\UserFacebookPreferences::PostFBOn_EarnAchievement) ? 'checked' : '' }}>
                                </td>
                            </tr>
                            <tr>
                                <td>When I fully complete a game:</td>
                                <td>
                                    <input id="FBUserPref1" type="checkbox" onchange="DoChangeFBUserPrefs(); return false;"
                                           value="1" {{ bit_value(auth()->user()->facebook_user_preferences, \RA\UserFacebookPreferences::PostFBOn_CompleteGame) ? 'checked' : '' }}>
                                </td>
                            </tr>
                            <tr>
                                <td>When I upload an achievement:</td>
                                <td>
                                    <input id="FBUserPref2" type="checkbox" onchange="DoChangeFBUserPrefs(); return false;"
                                           value="1" {{ bit_value(auth()->user()->facebook_user_preferences, \RA\UserFacebookPreferences::PostFBOn_UploadAchievement) ? 'checked' : '' }}>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <h4>Unlink Facebook</h4>
                        Click <a href="/requestremovefb.php?u=<?php echo auth()->user(); ?>">here</a> to remove Facebook from your
                        RetroAchievements account. Please note you will also need to remove permissions from within Facebook
                        to fully disassociate this app, by visiting <a
                                href="http://www.facebook.com/settings?tab=applications">this page</a> on Facebook.
                        <br><br>
                    @else
                        <fb:login-button show-faces="false" width="200" max-rows="1"
                                         data-perms="publish_actions"></fb:login-button>
                        <?php
                        //RenderFBLoginPrompt();
                        ?>
                        {{--<div class="fb-login-button" scope="publish_stream;publish_actions">Login with Facebook</div>--}}
                        <br>
                    @endif
                */ ?>
        </div>
    </div>
@endsection
