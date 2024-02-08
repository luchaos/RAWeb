<?php
/**
 * don't bother with this component if it wasn't configured
 * allows for "calm" frontend development - not spamming the browser console
 */
if (!config('services.twitch.channel')) {
    return;
}
$width ??= 300;
$height ??= 260;
$videoId ??= 0;
$class ??= '';
$autoplay = 'false';
$streamSelect ??= false;
?>
<x-section class="{{ $class }}">
    <h4>Twitch Stream</h4>
    <div class="streamvid">
        @if ($videoId !== 0 && isset($archiveURLs[$videoId]))
            <?php
            $vidTitle = htmlspecialchars($archiveURLs[$videoId]['Title']);
            $vidURL = $archiveURLs[$videoId]['Link'];
            $vidChapter = substr($vidURL, strrpos($vidURL, "/") + 1);
            ?>
        @else
            <?php
            $muted = 'false';
            if (!app()->environment('production')) {
                $muted = 'true';
            }
            ?>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe
                    src="https://player.twitch.tv/?channel={{ config('services.twitch.channel') }}&parent={{ parse_url(config('app.url'))['host'] }}"
                    class="embed-responsive-item"
                    allowfullscreen>
                </iframe>
            </div>
        @endif
    </div>

    <a href="https://twitch.tv/{{ config('services.twitch.channel') }}" target="_blank">See us on twitch.tv</a>

    {{-- @if($streamSelect)
         <form method="post" style="text-align:right; padding:4px 0">
             Currently Watching:
             <select name="g" onchange="reloadTwitchContainer( this.value, 600, 500 ); return false;">
                 <option value="0" {{ !$videoId ? 'selected' : '' }}>--Live--</option>
                 @foreach ($archiveURLs as $dataElementID => $dataElementObject)
                     <?php
                     $vidTime = $dataElementObject['Added'];
                     $niceDate = getNiceDate(strtotime($vidTime));
                     $vidAuthor = $dataElementObject['Author'];
                     $vidTitle = $dataElementObject['Title'];
                     $vidID = $dataElementObject['ID'];
                     ?>
                     <option value="{{ $dataElementID }}" {{ ($videoId == $vidID) ? 'selected' : '' }}>
                         {{ $vidTitle }} ({{ $vidAuthor }}, {{ $niceDate }})
                     </option>
                 @endforeach
             </select>
         </form>
     @endif--}}
</x-section>
