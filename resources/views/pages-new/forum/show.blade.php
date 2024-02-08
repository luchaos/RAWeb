@extends('forum.page')

@section('main')
    <livewire:forum-topics :forumId="$forum->id" />
@endsection

{{--
@section('sidebar')
    <x-section>
        @guest
            <p class="alert alert-warning mb-0">
                Log in or sign up to post in the forums.
            </p>
        @endguest
        @auth
            @cannot('create', [App\Models\ForumTopic::class, $forum])
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
@endsection
--}}
