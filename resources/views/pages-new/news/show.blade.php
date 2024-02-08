@extends('news.page')

@section('main')
    <x-section>
        @if($news->hasMedia('image'))
            <a href="{{ $news->getFirstMediaUrl('image') }}" target="_blank">
                <img class="w-full mb-3" src="{{ $news->getFirstMediaUrl('image') }}" alt="">
            </a>
        @endif
        @if($news->image)
            {{-- TODO remove after migration --}}
            <a href="{{ $news->image }}" target="_blank">
                <img class="w-full mb-3" src="{{ $news->image }}" alt="">
            </a>
        @endif
        @if($news->lead)
            <p class="lead mb-2 lg:mb-3 xl:mb-2 2xl:mb-3">
                {!! App\Support\Shortcode\Shortcode::render($news->lead) !!}
            </p>
        @endif
        @if($news->body)
            <p>
                {!! App\Support\Shortcode\Shortcode::render($news->body) !!}
            </p>
        @endif
        @if($news->link)
            {{-- TODO remove after migration --}}
            <p class="mt-5">
                <a href="{{ $news->link }}">
                    {{ $news->link }}
                </a>
            </p>
        @endif
    </x-section>

    @can('viewAny', [App\Models\NewsComment::class, $news])
        <livewire:news.comments :newsId="$news->id"/>
    @endCan
    {{-- TODO voting --}}
@endsection

@section('sidebar')
    {{--<div>--}}{{-- make sure there is a sidebar --}}{{--</div>--}}
    {{--
    TODO related game
    <x-section>
        [related game]
    </x-section>
    TODO related event
    <x-section>
        [related event]
    </x-section>
    --}}
@endsection
