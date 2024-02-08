<?php

use App\Enums\UserPreference;
use App\Models\User;
use Illuminate\Support\Carbon;
use function Laravel\Folio\{middleware, name};

middleware(['auth', 'can:viewAny,' . MessageThread::class]);
name('message.index');

?>

@props([
    'messages' => [],
    'currentPage' => 1,
    'totalPages' => 1,
    'unreadCount' => 0,
    'totalMessages' => 0,
])

@php
$user = request()->user();
$isShowAbsoluteDatesPreferenceSet = BitSet($user->websitePrefs, UserPreference::Forum_ShowAbsoluteDates);
$monthAgo = Carbon::now()->subMonth(1);
@endphp

<script>
function deleteMessage(id) {
    if (confirm('Are you sure you want to delete this message?')) {
        $.post("{{ route('message.store') }}", {
            thread_id: id,
            user: "{{ $user->User }}"
        })
    }
}
</script>

<x-app-layout
    pageTitle="Messages"
    pageDescription="Messages involving {{ $user->User }}"
>
    <x-slot name="header">
        <x-page-header
            :background="$user->avatar_url"
        >
            <x-slot name="title">
                <h1 class="mb-[-30px] ml-3">{{ __res('message') }}</h1>
            </x-slot>
            <x-slot name="actions">
                <a class="btn" href='{{ route('message.create') }}'>
                    <x-fas-pen />
                    {{ __res('message', 1) }}
                </a>
            </x-slot>
            <x-slot name="stats">
                <x-page-header-stat label="Unread {{ __res('message', $unreadCount) }}" :value="$unreadCount" />
                <x-page-header-stat label="{{ __res('message-thread', $totalMessages) }}" :value="$totalMessages" />
            </x-slot>
        </x-page-header>
    </x-slot>

    <div class="w-full flex mt-2">
        <div class="w-full flex justify-end">
            <x-paginator :totalPages="$totalPages" :currentPage="$currentPage" />
        </div>
    </div>

    <div>
        <table class="table-highlight mb-4">
            <tbody>

            <tr>
                <th style="width:20%">With</th>
                <th style="width:55%">Title</th>
                <th style="width:10%" class="text-right">Messages</th>
                <th style="width:15%" class="text-right">Last Message</th>
            </tr>
            @foreach ($messages as $message)
                @php
                    $mostRecentUpdate = Carbon::parse($message->last_message_at);
                    $humanDate = $mostRecentUpdate->format('F j Y, g:ia');

                    $num_unread = $message->num_unread;
                @endphp
                <tr>
                    <td @if ($num_unread > 0) class="font-bold" @endif>
                        @if (empty($message->other_participants))
                            {!! userAvatar($user, iconSize: 24) !!}
                        @else
                            @foreach ($message->other_participants as $participant)
                                {!! userAvatar($participant, iconSize: 24) !!}
                            @endforeach
                        @endif
                    </td>

                    <td @if ($num_unread > 0) class="font-bold" @endif>
                        <a href="{{ route('message-thread.show', ['messageThread' => $message->id]) }}">
                            {{ $message->title }}
                        </a>
                    </td>

                    <td class="text-right">
                        @if ($num_unread == 0)
                            {{ $message->num_messages }}
                        @elseif ($num_unread == $message->num_messages)
                            <b>{{ $num_unread }} (unread)</b>
                        @else
                            {{ $message->num_messages }} <b>({{ $num_unread }} unread)</b>
                        @endif
                    </td>

                    <td class="text-right">
                        @if ($isShowAbsoluteDatesPreferenceSet || $mostRecentUpdate < $monthAgo)
                            <span class="smalldate">{{ $humanDate }}</span>
                        @else
                            <span class="smalldate cursor-help" title="{{ $humanDate }}">{{ $mostRecentUpdate->diffForHumans() }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="w-full flex justify-end mt-2">
        <x-paginator :totalPages="$totalPages" :currentPage="$currentPage"/>
    </div>

</x-app-layout>
