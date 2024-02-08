@foreach($forums as $forum)
    <x-section class="mb-4">
        <div class="flex items-start">
            <x-far-arrow-alt-circle-right class="icon-sm mr-3" />
            <div class="flex-1">
                <div>
                    <a href="{{ $forum->canonicalUrl }}">
                        <span class="text-large lh-1-2">
                            {{ $forum->title }}
                        </span>
                    </a>
                </div>
                <div>
                    {{ $forum->description }}
                </div>
            </div>
            <div class="ml-3 text-right {{ $forum->topics_count > 0 ? '' : 'text-secondary' }}">
                <b class="text-larger" style="cursor: help" data-toggle="tooltip" title="{{ $forum->topics_count }} {{ __res('forum-topic', $forum->topics_count) }}">
                    <x-heroicon-o-chat-alt />
                    {{ $forum->topics_count }}
                </b>
            </div>
        </div>
    </x-section>
@endforeach
