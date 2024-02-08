@if($results->count())
    <x-section class="mb-5 hidden md:block">
        <div id="newsCarousel" class="carousel slide mb-0" data-bs-ride="carousel" data-bs-interval="8000">
            <ol class="carousel-indicators">
                @foreach($results as $news)
                    <li data-bs-target="#newsCarousel" data-bs-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            {{--<x-section-background
                :image="asset('assets/images/news/image.png')"
                :scanlines="false"
                :z-index="1"
            />--}}
            <div class="carousel-inner">
                @foreach($results as $news)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <x-section-background
                            :image="$news->getFirstMediaUrl('image')"
                            :scanlines="true"
                            :z-index="1"
                        />
                        <div class="carousel-caption news-item hidden md:flex text-left flex-column justify-center">
                            <div class="container">
                                <div class="2xl:grid grid-flow-col gap-4">
                                    <div class="2xl:col-7">
                                        <h3 class="h4 mb-0 2xl:mb-1">
                                            <a href="{{ route('news.show', $news) }}">
                                                {{ $news->title }}
                                            </a>
                                        </h3>
                                        <p class="mb-2 2xl:mb-3">
                                            {!! __('by :user on :date', ['user' => user_avatar($news->user), 'date' => localized_date($news->created_at)]) !!}
                                            {{--<x-user.avatar :user="$news->user" />, <x-datetime :dateTime="$news->created_at" />--}}
                                        </p>
                                        <p class="mb-2 lg:mb-3 xl:mb-2 2xl:mb-3">
                                            {!! parseShortcodes($news->lead) !!}
                                        </p>
                                        @if($news->body)
                                            <p class="mb-0 text-right">
                                                <a class="btn btn-sm btn-primary" href="{{ route('news.show', $news) }}">
                                                    Read more &hellip;
                                                </a>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="hidden 2xl:block 2xl:col-5 text-right">
                                        @if($news->hasMedia('image'))
                                            <img style="max-width: 100%; max-height:450px" src="{{ asset($news->getFirstMediaUrl('image')) }}" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#!" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">
                    <x-fas-chevron-left />
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#!" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true">
                    <x-fas-chevron-right />
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </x-section>
    <x-section class="mb-5 md:hidden">
        @foreach($results->take(3) as $news)
            <x-news.card :news="$news" />
        @endforeach
    </x-section>
@endif
