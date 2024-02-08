@extends('layouts.app')

@section('main')
    <x-section>
        <div class="float-right">
            @include('vendor.pagination.simple', ['paginator' => $comments])
        </div>
        <h3>
            Unauthorised Forum Posts Clearing
        </h3>
        <p class="lead">
            List of not yet authorised comments that need clearing.
        </p>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm">
                <tbody>
                <tr>
                    <th></th>
                    <th>Author</th>
                    <th>Message</th>
                    <th>Posted</th>
                </tr>
                @foreach ($comments as $comment)
                    <tr>
                        <td>
                            <x-user.avatar :user="$comment->user" display="icon" />
                        </td>
                        <td>
                            <x-user.avatar :user="$comment->user" />
                        </td>
                        <td class="wrap">
                            <a href="{{ route('forum-topic.comment.show', $comment) }}">
                                {{ $comment->topic->title }}
                            </a>
                            <br>{{ substr($comment->body, 0, 100) }} &hellip;
                        </td>
                        <td class="text-small">
                            <x-datetime :dateTime="$comment->created_at" />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-right">
            @include('vendor.pagination.simple', ['paginator' => $comments])
        </div>
    </x-section>
@endsection
