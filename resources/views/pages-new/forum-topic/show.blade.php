@extends('forum-topic.page')

{{--
// TODO: Report offensive content
// TODO: Subscribe to this topic
// TODO: Make top-post wiki
--}}

@section('main')
    <x-section>
        <x-comment :comment="$topic" />
        {{--{!! rich_content($topic->body) !!}--}}
    </x-section>
    <livewire:forum-topic.comments :topicId="$topic->id" />
@endsection

{{--@section('sidebar')
    <x-section>
        @guest
            <p class="alert alert-warning mb-0">
                Log in or sign up to post in the forums.
            </p>
        @endguest
        @auth
            @cannot('create', [App\Models\ForumComment::class, $topic])
                <p class="alert alert-warning mb-0">
                    A verified email address is required to comment in the forums.
                </p>
            @endcannot
            <p>
                <a class="btn btn-block btn-primary" href="">
                    <x-far-newspaper/>
                    Subscribe
                </a>
            </p>
        @endauth
    </x-section>

    @can('manage', $topic)
        <x-section>
            <p>
                <a class="btn btn-block btn-outline-warning" href="">
                    <x-fas-map-pin/>
                    Pin
                </a>
            </p>
            <p>
                <a class="btn btn-block btn-outline-warning" href="">
                    <x-fas-lock/>
                    Lock
                </a>
            </p>
        </x-section>
    @endcan
--}}
{{--
    @if($topic->user == request()->user() || request()->user()->role_id >= \RA\Site\Models\Role::Developer)
        <div class="float-right embedded btn-group">
            <button type="button" class="btn btn-sm btn-primary"
                    data-toggle="tooltip" title="Settings"
                    onclick="$('#devboxcontent').toggle(200)">
                <x-fas-cog/>
            </button>
        </div>
    @endif
    @if ($thisTopicAuthor == request()->user()->username || $role >= \RA\Site\Models\Role::Developer)
        <p>Restrict Topic</p>
        <form action="/requestmodifytopic.php" method="post">
            <select name="v">
                <option value="0" {{ ($thisTopicPermissions == 0) ? 'selected' : '' }}>
                    Unregistered
                </option>
                <option value="1" {{ ($thisTopicPermissions == 1) ? 'selected' : '' }}>
                    Registered
                </option>
                <option value="2" {{ ($thisTopicPermissions == 2) ? 'selected' : '' }}>
                    Super User
                </option>
                <option value="3" {{ ($thisTopicPermissions == 3) ? 'selected' : '' }}>
                    Developer
                </option>
                <option value="4" {{ ($thisTopicPermissions == 4) ? 'selected' : '' }}>
                    Admin
                </option>
            </select>
            <input type="hidden" name="t" value="{{ $topic->ID }}">
            <input type="hidden" name="f" value="{{ \RA\Site\Models\ModifyTopicField::RequiredPermissions }}">
            <input type="submit" name="submit" value="Change Minimum Permissions">
        </form>
    @endif
--}}
