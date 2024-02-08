<?php

use App\Models\News;

/** @var ?News $news */
$news ??= $model ?? null;
?>
<div class="news-item relative">
    <x-section-background
        {{--:image="$news->getFirstMediaUrl('image')"--}}
        :image="$news->Image"
        z-index="1"
        :border="false"
    />
    <div class="flex flex-col justify-end min-h-[12em] relative" style="z-index: 2">
        <div class="px-4 py-4">
            <h2 class="h4 mb-0 p-0 border-0">
                <a href="{{ route('news.show', $news) }}">
                    {{ $news->title }}
                </a>
            </h2>
            <p class="mb-0">
                @if($news->user)
                    {!! __('by :user on :date', ['user' => user_avatar($news->user), 'date' => localized_date($news->created_at)]) !!}
                @else
                    {{-- TODO remove as soon as Author is migrated to user_id --}}
                    {!! __('by :user on :date', ['user' => $news->Author, 'date' => localized_date($news->created_at)]) !!}
                @endif
            </p>
            @if($displayLead ?? false)
                <p class="lead mb-2 lg:mb-3 xl:mb2 2xl:mb-3">
                    {!! App\Support\Shortcode\Shortcode::render($news->lead) !!}
                </p>
            @endif
        </div>
    </div>
</div>
