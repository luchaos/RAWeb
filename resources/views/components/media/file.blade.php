<?php
if (!$media) {
    return;
}
$icon = 'fas-file';
switch ($media->mime_type ?? null) {
    case 'application/zip':
        $icon = 'fas-file-archive';
        break;
    case 'application/x-dosexec':
        $icon = 'fas-file-code';
        break;
}
?>
<a href="{{ $media->getUrl() }}" target="_blank">
    <div class="flex items-start embedded p-2 text-left">
        {{ svg($icon, 'icon icon-sm mr-2') }}
        <div class="flex-1 lh-1-2">
            <b>
                {{ $media->file_name }}
            </b>
            <x-fas-external-link-alt />
            <div class="text-secondary lh-1">
                <small>
                    <b>
                        {{ $media->mime_type }}
                        <x-number :number="$media->size / 1024 / 1024" :fractionDigits="2" />
                        MiB
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
    </div>
</a>
