<?php
/** @var Spatie\MediaLibrary\MediaCollections\Models\Media $media */
if (!$media) {
    return;
}

/**
 * do not show original by default
 */
$showOriginal ??= false;
$conversions ??= null;
if (!$conversions) {
    $conversions = $media->getMediaConversionNames();
}
if ($showOriginal) {
    $conversions = array_merge([''], $conversions);
}
?>
<div class="lg:flex flex-wrap">
    @foreach($conversions as $conversion)
        <div class="mb-2 {{ $loop->last ? '' : 'mr-2' }}">
            <a href="{{ asset($media->getUrl($conversion)) }}" target="_blank">
                <div class="flex items-start embedded p-2 text-left">
                    <div class="icon mr-2 text-center">
                        <x-fas-image />
                        <div>
                            <small><b>{{ $conversion ? strtoupper($conversion) : 'Original' }}</b></small>
                        </div>
                    </div>
                    <div>
                        @if(!$conversion)
                            <div class="mb-2">
                                <b>
                                    {{ $media->file_name }}
                                </b>
                                <x-fas-external-link-alt />
                                <div class="text-secondary lh-1">
                                    <small>
                                        <b>
                                            {{ $media->mime_type }}
                                            <x-number :number="$media->size / 1024" :fractionDigits="2" />
                                            KiB
                                            @if($conversion)
                                                (original file)
                                            @endif
                                        </b>
                                    </small>
                                    @if($media->getCustomProperty('sha1'))
                                        <div class="">
                                            <small>
                                                <b>SHA1:</b> <small class="text-monospace">{{ $media->getCustomProperty('sha1') }}</small>
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div>
                                <img class="w-full" src="{{ asset($media->getUrl($conversion)) }}"
                                     alt="{{ $media->file_name }}"
                                     style="max-height:500px;">
                            </div>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
