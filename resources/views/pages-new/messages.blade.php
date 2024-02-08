@extends('inbox.page', [
    'section' => 'messages',
    'title' => __res('message'),
])

{{--@section('breadcrumb')
    <li>
        {{ __res('message') }}
    </li>
@endsection--}}

@section('main')
    <x-section>
        <x-section-header>
            <x-slot name="title">
                <h3>
                    {{ __res('message') }}
                </h3>
            </x-slot>
            <x-slot name="actions">
                <a class="btn btn-outline-secondary border-0" href='{{ route('message.create') }}'>
                    <x-fas-pen />
                    {{ __res('message', 1) }}
                </a>
                {{--
                @if ($unreadOnly)
                    <span class='text-right btn btn-sm'><a href='{{ route('message.index') }}?u=0'>View All Messages</a></span>
                @else
                    <span class='text-right btn btn-sm'><a href='{{ route('message.index') }}?u=1'>Unread</a></span>
                @endif
                <div class="btn-group btn-group-sm embedded">
                    <span class="btn">
                        <x-fas-check/><br>[mark all as read]
                    </span>
                </div>--}}
            </x-slot>
        </x-section-header>
    </x-section>

    @foreach($messages as $message)
        {{ $message }}
    @endforeach

    {{--<div id='messagecounttext'>
        <span id='messagecountcontainer'>
        You have <b>{{ $messages->count() }}</b> unread messages
        </span>
        and {{ $messages->count() }} total messages.
    </div>--}}

   {{--  @foreach($messages as $message)
        <?php
        // $messageBody = strip_tags($message->body);
        // $messageBody = stripslashes($messageBody);
        // $messageBody = shortcode($messageBody);
        //$msgPayload = str_replace( '\r\n', '<br>', $msgPayload );
        //$msgPayload = str_replace( '\n', '<br>', $msgPayload );
        ?>
        <div class="flex items-start mb-3 embedded p-2">
            <div class="mr-2">
                --}}{{--@if($message->sender == auth()->user())--}}{{--
                --}}{{--<x-fas-arrow-alt-circle-up/>--}}{{--
                --}}{{--@else--}}{{--
                --}}{{--<x-fas-arrow-alt-circle-down/>--}}{{--
                --}}{{--@endif--}}{{--
                @userIcon($message->sender)
            </div>
            <div class="flex-1">

                --}}{{--<div class='btn-group float-right'>--}}{{--
                --}}{{--<span class='text-right btn btn-sm'>--}}{{--
                --}}{{--<a href='#' onclick="MarkAsUnread( $message ); return false;">Mark as unread</a>--}}{{--
                --}}{{--</span>--}}{{--
                --}}{{--<span class='text-right btn btn-sm'>--}}{{--
                --}}{{--<a href='{{ route('message.create') }}?t={{ $msgFrom }}&i={{ $message }}'>Reply</a>--}}{{--
                --}}{{--</span>--}}{{--
                --}}{{--<span class='text-right btn btn-sm'>--}}{{--
                --}}{{--<a href="{{ route('message.destroy', $message) }}">Delete</a>--}}{{--
                --}}{{--</span>--}}{{--
                --}}{{--</div>--}}{{--
                --}}{{--<td>" . $msgTo . "</td>--}}{{--
                --}}{{--<td onclick="MarkAsRead( $message ); return false;">--}}{{--
                --}}{{--<span>--}}{{--
                --}}{{--@if ($msgUnread)--}}{{--
                --}}{{--<span class='unreadmsgtitle'>{{ $msgTitle }}</span>--}}{{--
                --}}{{--@else--}}{{--
                --}}{{--{{ $message->title }}--}}{{--
                --}}{{--@endif--}}{{--
                --}}{{--</span>--}}{{--
                --}}{{--</td>--}}{{--

                <div>
                    @user($message->sender) to @user($message->recipient)
                    <small class="text-secondary">
                        {{ $message->sent_at->format('j M G:i') }}
                    </small>
                </div>
                <div>
                    <b>
                        {{ $message->title }}
                    </b>
                </div>
                {!! $messageBody !!}
            </div>
        </div>
    @endforeach --}}
@endsection

@push('scripts')
    <?php /*
    <script>
        function MarkAsRead(msgID) {
            $("body").find('#msgInline' + msgID).toggle(300);

            //	If was unread
            var unread = $('#msgInlineTitle' + msgID + ' span.unreadmsgtitle');
            if (unread.contents().exists()) {
                var posting = $.post("/requestsetmessageread.php", {u: '<?php echo $user; ?>', m: msgID, r: 0});
                posting.done(onMarkAsRead);
            }
        }

        function onMarkAsRead(data) {
            if (data.substr(0, 3) == 'OK:') {
                var msgID = data.substr(3);
                var titleID = "#msgInlineTitle" + msgID;
                if ($("body").find(titleID).find('span').contents().exists()) {
                    $("body").find(titleID).find('span').contents().unwrap();

                    //	Reduce the number of unread messages by 1
                    var numUnread = parseInt($("body").find("#messagecounttext").find('b').html());
                    numUnread = numUnread - 1;
                    $("body").find("#messagecounttext").find('b').html(numUnread);

                    UpdateMailboxCount(numUnread);

                    if (numUnread == 0) {
                        if ($('#messagecountcontainer').find('big').contents().exists())
                            $('#messagecountcontainer').find('big').contents().unwrap();
                    }
                }
            }
        }

        function MarkAsUnread(msgID) {
            var posting = $.post("/requestsetmessageread.php", {u: '<?php echo $user; ?>', m: msgID, r: 1});
            posting.done(onMarkAsUnread);
        }

        function onMarkAsUnread(data) {
            if (data.substr(0, 3) == 'OK:') {
                var msgID = data.substr(3);
                $('#msgInline' + msgID).toggle(300);
                var titleID = "#msgInlineTitle" + msgID;

                if ($("body").find(titleID).find('span').contents().exists() == false) {
                    $("body").find(titleID).contents().wrap("<span class='unreadmsgtitle'>");

                    //	Increase the number of unread messages by 1
                    var numUnread = parseInt($("body").find("#messagecounttext").find('b').html());
                    numUnread = numUnread + 1;
                    $("body").find("#messagecounttext").find('b').html(numUnread);

                    if (numUnread > 0) {
                        if ($('#messagecountcontainer').find('big').contents().exists() == false)
                            $('#messagecountcontainer').contents().wrap('<big>');
                    }

                    UpdateMailboxCount(numUnread);
                }
            }
        }
    </script>
    */ ?>
@endpush
