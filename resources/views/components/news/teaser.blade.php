<div @if($defer ?? false)wire:init="ready" @endif class="news-teaser hidden lg:block">
    <div
        wire:loading.class="block"
        class="hidden"
        style="{{ ($results ?? null) && $results->isNotEmpty() ? '' : 'height:200px' }}"
    >
        <div class="background flex flex-row justify-center"
             style="z-index: 5; background-color: rgba(0,0,0,0); cursor: wait">
            <div class="flex flex-col justify-center" style="height:200px">
                <x-loader class="mb-3" size="lg" />
            </div>
        </div>
    </div>
    @if($results)
        @if($results->count())
            <div class="flex justify-around flex-row">
                @foreach($results as $news)
                    <div class="w-1/4 flex-grow-1">
                        <x-news.card :news="$news" />
                    </div>
                @endforeach
            </div>
            {{--@else
                <div class="flex items-center h-100">
                    <x-resource.empty resource="news"/>
                </div>--}}
        @endif
    @endif
</div>
