<?php

use App\Models\Badge;

/** @var Badge $badge */
$badge ??= $model ?? null;

$class ??= '';
$display ??= 'icon';
$iconSize ??= 'sm';
$link ??= $badge->canonicalUrl ?? null;
$tooltip ??= true;

$badgeButGameIsIncomplete = $badge->incomplete;

// $tooltipTitle = "Site Badge";
//
// /**
//  * TODO: move all of this to the database
//  */
// switch ($badge->badge_type) {
//     case 1:
//         $game = \App\Models\Game::find($badge->badge_id);
//         if ($badge->extra == '1') {
//             $tooltipTitle = 'MASTERED ' . $game->title . '(' . $game->system->name . ')';
//             $class .= ' goldimage';
//         } else {
//             $tooltipTitle = 'Completed ' . $game->title . '(' . $game->system->name . ')';
//         }
//         /**
//          * TODO: redesign this to "feats of strength"
//          */
//         // if ($badgeButGameIsIncomplete) {
//         //     $tooltip .= "...<br>but more achievements have been added!<br>Click here to find out what you're missing!";
//         // }
//         $image = asset($game->getFirstMediaUrl('icon', '64'));
//         $link = $game->canonicalUrl;
//         break;
//     case 2:
//         // Developed a number of earned achievements
//         $tooltipTitle = "Awarded for being a hard-working developer and producing achievements that have been earned over " . \App\Models\Badge::$developerCountBoundaries[$badge->badge_id] . " times!";
//
//         $image = asset('assets/images/_Trophy' . \App\Models\Badge::$developerCountBoundaries[$badge->badge_id] . '.png');
//         break;
//     case 3:
//         // Yielded an amount of points earned by players
//         $tooltipTitle = "Awarded for producing many valuable achievements, providing over " . \App\Models\Badge::$developerPointBoundaries[$badge->badge_id] . " points to the community!";
//
//         if ($badge->badge_id == 0)
//             $image = asset("Badge/00133.png");
//         elseif ($badge->badge_id == 1)
//             $image = asset("Badge/00134.png");
//         elseif ($badge->badge_id == 2)
//             $image = asset("Badge/00137.png");
//         elseif ($badge->badge_id == 3)
//             $image = asset("Badge/00135.png");
//         elseif ($badge->badge_id == 4)
//             $image = asset("Badge/00136.png");
//         else
//             $image = asset("Badge/00136.png");
//         break;
//     case 4:
//         // Referrals
//         $tooltipTitle = "Referred $badge->badge_id members";
//         if ($badge->badge_id < 2)
//             $image = asset("Badge/00083.png");
//         elseif ($badge->badge_id < 3)
//             $image = asset("Badge/00083.png");
//         elseif ($badge->badge_id < 5)
//             $image = asset("Badge/00083.png");
//         elseif ($badge->badge_id < 10)
//             $image = asset("Badge/00083.png");
//         elseif ($badge->badge_id < 15)
//             $image = asset("Badge/00083.png");
//         else
//             $image = asset("Badge/00083.png");
//         break;
//     case 5:
//         // Connected to facebook
//         $tooltipTitle = "Awarded for associating their account with Facebook! Thanks for spreading the word!";
//         $image = asset("assets/images/_FBAssoc.png");
//         $linkdest = "/controlpanel.php#facebook";
//         break;
//     case 6:
//         // Patreon Supporter
//         $tooltipTitle = 'Awarded for being a Patreon supporter! Thank-you so much for your support!';
//         $image = asset('Badge/PatreonBadge.png');
//         $link = 'https://www.patreon.com/retroachievements';
//         break;
//     default:
//         \Illuminate\Support\Facades\Log::warning("Unknown badge type" . $badge->badge_type);
//         continue;
//         break;
// }

// $displayable = "<a href=\"$linkdest\"><img class=\"$imgclass\" alt=\"$tooltip\" title=\"$tooltip\" src=\"$image\" width=\"$imageSize\" height=\"$imageSize\"></a>";
// $tooltipImagePath = "$image";
//
// $textWithTooltip = tooltip($displayable, $tooltipImagePath, $tooltipImageSize, $tooltipTitle,
//     htmlspecialchars($tooltip));
// $newOverlayDiv = '';
// if ($badgeButGameIsIncomplete) {
//     $newOverlayDiv = tooltip("<a href=\"$linkdest\"><div class=\"trophyimageincomplete\"></div></a>",
//         $tooltipImagePath, $tooltipImageSize, $tooltipTitle, $tooltip);
// }
?>
<x-avatar
    :class="$class"
    :display="$display"
    :link="$link"
    :model="$badge"
    resource="badge"
    :tooltip="$tooltip"
>
    @if($badge ?? null)
        @if($display === 'icon')
            <img src="{{ asset($image) }}" class="icon-{{ $iconSize }}" loading="lazy"
                 width="{{ $iconWidth }}" height="{{ $iconHeight }}" alt="{{ $badge->Title }}">
        @endif
        @if($display === 'id'){{ $badge->id }}@endif
        @if($display === 'name'){{ $badge->title }}@endif
    @endif
</x-avatar>
