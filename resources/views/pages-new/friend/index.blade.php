@extends('user.page', [
    'resource' => 'friend',
    'section' => 'friends',
])

@section('main')
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h3>{{ __res('friend') }}</h3>
            </x-slot>
        </x-section-header>
        {{-- <livewire:grid
             resource="friend"
         />--}}
        {{--<h2>Friends</h2>
        @if($friends->isEmpty())
            You don't appear to have friends registered here yet. Why not leave a comment on the
            <a href="{{ route('forum.index') }}">forums</a> or
            <a href="{{ route('user.index') }}">browse the user pages</a>
            to find someone to add to your friend list?<br>
        @else
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Friend</th>
                    <th>Points</th>
                    <th>Last Seen</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($results as $friend)
                    <tr>
                        <td>
                            @userIcon($friend)
                        </td>
                        <td>
                            @user($friend)
                        </td>
                        <td class="text-right">
                            {{ $friend->points_total }}
                        </td>
                        <td>
                            {{ $friend->rich_presence }}
                        </td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm embedded">
                                <a class="btn" href="{{ route('message.create') }}?to={{ request()->user()->username }}"
                                   data-toggle="tooltip" title="Send Message">
                                    <x-fas-envelope/>
                                </a>
                                <a class="btn"
                                   href="/requestchangefriend.php?u=$user&amp;c=$cookie&amp;f=$nextFriendName&amp;a=0"
                                   data-toggle="tooltip" title="Remove Friend">
                                    <x-fas-times-circle/>
                                </a>
                                <a class="btn"
                                   href="/requestchangefriend.php?u=$user&amp;c=$cookie&amp;f=$nextFriendName&amp;a=-1"
                                   data-toggle="tooltip" title="Block User">
                                    <x-fas-ban/>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    --}}
    </x-section>
@endsection

