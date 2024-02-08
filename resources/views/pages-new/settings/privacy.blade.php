@extends('settings.page', [
    'section' => 'privacy',
    'title' => __('Privacy'),
])

@section('main')
    <div class="2xl:grid grid-flow-col gap-4">
        <div class="2xl:col-6">
            <p class="lead">{{ __('Privacy Settings') }}</p>
            <p class="lead">{{ __('Recent playing') }}</p>
            <p class="lead">{{ __('Receiving messages') }}</p>
            <p>These options allow you to control who may send you messages. Blocking people here will prevent them from:

                Sending you private messages
                Posting in your shoutbox
                Commenting on your journal posts
                Accept messages from:</p>
            <p class="lead">{{ __('Profile Comments') }}</p>
            <p>
                Disable comments on my profile
                <x-input.checkbox :model="auth()->user()" attribute="wall_active" help="Allow others to comment on your profile" />
            </p>

            {{--<div class="form-group row">
                <label class="lg:col-3 lg:text-right">
                    Wall
                </label>
                <div class="lg:col-9">
                    <button class="btn btn-sm btn-outline-warning"
                            data-delete="Are you sure?"
                            data-url="{{ route('user.comment.destroyAll', auth()->user()) }}">
                        Delete All Comments
                    </button>
                    <p class="help-block text-secondary mb-0">
                        Remove all comments from my wall
                    </p>
                </div>
            </div>--}}

            <p class="lead">Ignore List</p>
            <p>
                Add users who you want to ignore to this list. Any messages from these users will be automatically deleted and you will not see their activity on the site.
            </p>
            <p>
                Username : add to list
            </p>
            <p>
                Currently ignoring
                There are no users in your list.
            </p>
        </div>
    </div>
@endsection
