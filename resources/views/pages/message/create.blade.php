<?php

use App\Models\Message;
use function Laravel\Folio\{middleware, name};

middleware(['auth', 'can:create,' . Message::class]);
name('message.create');

?>

@php
$toUser = request()->input('to') ?? '';
$subject = request()->input('subject') ?? '';
$message = request()->input('message') ?? '';
@endphp

<x-app-layout
    pageTitle="New Message"
    pageDescription="Create a new message"
    {{--section="messages"--}}
    {{--:title="__res('message')"--}}
>
    <x-message.breadcrumbs currentPage="New Message" />

    <div class="w-full flex gap-x-3">
        <h1 class="mt-[10px] w-full">New Message</h1>
    </div>

    {{--<x-section>
        --}}{{--@if ($messageContextData !== null)
            In reply to
            <x-user.avatar :user="$message->from"/>
            who wrote:<br><br>
            <div>
                " . parseTopicCommentPHPBB($messageContextPayload) . "
            </div>
        @endif--}}{{--
        <x-form :action="route('message.store')">
            <x-input.text attribute="recipient" required />
            <x-input.text attribute="subject" required />
            <x-input.textarea attribute="message" maxlength="2000" shortcode required />
            <x-form-actions requiredFields />
        </x-form>
    </x-section>--}}

    <form action="{{ route('message.store') }}" method='post' x-data='{ isValid: true }'>
        {{ csrf_field() }}
        <div><table class='mb-4'><tbody>
            <tr>
                <td><label for='recipient'>User:</label></td>
                <td>
                    <div class="w-full flex justify-between items-center">
                        <div><x-input.user-select name="recipient" :user="$toUser" /></div>
                        <div><x-input.user-select-image for="recipient" :user="$toUser" size="48" /></div>
                    </div>
                </td>
            </tr>

            <tr>
                <td><label for='title'>Subject:</label></td>
                <td><input class='w-full' type='text' value='{{ $subject }}' id='title' name='title' required /></td>
            </tr>

            <tr>
                <td><label for='commentTextarea'>Message:</label></td>
                <td>
                    <x-input.shortcode-textarea
                        name='body'
                        placeholder='Enter your message here...'
                    >{{ $message }}</x-input.shortcode-textarea>
                </td>
            </tr>
        </tbody></table></div>
    </form>

</x-app-layout>
