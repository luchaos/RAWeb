@extends('game.page')

<?php
/**
 * TODO: store on system models as settings
 */
$screenshotHeight = 240;
?>

{{--@section('breadcrumb')
    @if($game->system)
        <li>
            <a href="{{ route('system.show', $game->system) }}">
                {{ $game->system->name }}
            </a>
        </li>
        <li>
            <a href="{{ $game->system->gamesLink }}">
                {{ __res('game') }}
            </a>
        </li>
        <li>
            {{ $game->title }}
        </li>
    @else
        <li>
            <a href="{{ route('game.index') }}">
                {{ __res('game') }}
            </a>
        </li>
        <li>
            {{ $game->title }}
        </li>
    @endif
@endsection--}}

@section('main')
    @if($game->hasMedia('image_title') || $game->hasMedia('image_in_game'))
        <x-section>
            <div class="embedded p-3">
                <div class="sm:grid grid-flow-col gap-4">
                    @if($game->hasMedia('image_title'))
                        <div class="sm:col-6 text-center mb-3 sm:mb-0">
                            <a href="{{ asset($game->image_title) }}" target="_blank"
                               style="max-height: {{ $screenshotHeight }}px; overflow: hidden">
                                <img class="w-full" src="{{ asset($game->image_title) }}">
                            </a>
                        </div>
                    @endif
                    @if($game->hasMedia('image_in_game'))
                        <div class="sm:col-6 text-center mb-3 sm:mb-0">
                            <a href="{{ asset($game->image_in_game) }}" target="_blank">
                                <img class="w-full" src="{{ asset($game->image_in_game) }}">
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </x-section>
    @endif

    @if($game->achievements->isNotEmpty())
        <x-achievement.list :achievements="$game->achievements" :playerCount="$game->players_count"/>
    @endif

    @can('viewAny', [App\Models\GameComment::class, $game])
        <livewire:game.comments :gameId="$game->id" :take="5"/>
    @endCan
@endsection

@section('sidebar')
    <x-game.info :game="$game"/>
    {{--@include('game-hash.partials.hashes')--}}
    <?php
    // RenderLinkToGameForum($user->username ?? null, $cookie, $game->title, $game->id, $game->forum_topic->id);
    ?>
    {{--    <x-section>--}}
    {{--        <a href="" class="btn btn-lg embedded btn-block">--}}
    {{--            <x-fas-comment/>--}}
    {{--            Game Discussions--}}
    {{--        </a>--}}
    {{--    </x-section>--}}
    {{--    @include('game.partials.forum')--}}
    <?php
    // RenderCommentsComponent($user->username ?? null, $numArticleComments, $commentData, $game->id, 1, $forceAllowDeleteComments);
    ?>
    {{--@include('game.partials.alternatives')--}}
    {{--@guest--}}
    {{--@include('content.tutorial')--}}
    {{--@endguest--}}
    {{--@include('game.partials.compare')--}}
    {{--@include('game.partials.achievement-distribution')--}}
    {{--@include('game.partials.highscores')--}}
    <?php
    // RenderGameLeaderboardsComponent($game->id, $lbData);
    ?>
    {{-- @if($game->leaderboards->isNotEmpty())
         @include('leaderboard.partials.list', ['leaderboards' => $game->leaderboards])
     @endif--}}
@endsection

@push('scripts')
    <?php /*
    <script>
        var lastKnownAchRating = 0;
        var lastKnownGameRating = 0;

        function SetLitStars(container, numStars) {
            $(container + ' a').removeClass('starlit');
            $(container + ' a').removeClass('starhalf');

            if (numStars >= 0.5)
                $(container + ' a:first-child').addClass('starhalf');
            if (numStars >= 1.5)
                $(container + ' a:first-child + a').addClass('starhalf');
            if (numStars >= 2.5)
                $(container + ' a:first-child + a + a').addClass('starhalf');
            if (numStars >= 3.5)
                $(container + ' a:first-child + a + a + a').addClass('starhalf');
            if (numStars >= 4.5)
                $(container + ' a:first-child + a + a + a + a').addClass('starhalf');

            if (numStars >= 1) {
                $(container + ' a:first-child').removeClass('starhalf');
                $(container + ' a:first-child').addClass('starlit');
            }
            if (numStars >= 2) {
                $(container + ' a:first-child + a').removeClass('starhalf');
                $(container + ' a:first-child + a').addClass('starlit');
            }

            if (numStars >= 3) {
                $(container + ' a:first-child + a + a').removeClass('starhalf');
                $(container + ' a:first-child + a + a').addClass('starlit');
            }

            if (numStars >= 4) {
                $(container + ' a:first-child + a + a + a').removeClass('starhalf');
                $(container + ' a:first-child + a + a + a').addClass('starlit');
            }

            if (numStars >= 5) {
                $(container + ' a:first-child + a + a + a + a').removeClass('starhalf');
                $(container + ' a:first-child + a + a + a + a').addClass('starlit');
            }
        }

        function GetRating(gameID) {
            $('.ratinggamelabel').html("Rating: ...");
            $('.ratingachlabel').html("Rating: ...");
            $.ajax({
                url: '/API/API_GetGameRating.php?i=' + gameID,
                dataType: 'json',
                success: function (results) {
                    // results.GameID;
                    lastKnownGameRating = parseFloat(results.Ratings['Game']);
                    lastKnownAchRating = parseFloat(results.Ratings['Achievements']);
                    var gameRatingNumVotes = results.Ratings['GameNumVotes'];
                    var achRatingNumVotes = results.Ratings['AchievementsNumVotes'];

                    SetLitStars('#ratinggame', lastKnownGameRating);
                    SetLitStars('#ratingach', lastKnownAchRating);

                    $('.ratinggamelabel').html("Rating: " + lastKnownGameRating.toFixed(2) + " (" + gameRatingNumVotes + " votes)");
                    $('.ratingachlabel').html("Rating: " + lastKnownAchRating.toFixed(2) + " (" + achRatingNumVotes + " votes)");
                    $('#ratinggame').css('display', 'block !important');
                },
                error: function (temp, temp1, temp2) {
                    system.error("Error " + temp + temp1 + temp2);
                    $('.ratinggamelabel').html("Rating: ?");
                    $('.ratingachlabel').html("Rating: ?");
                }
            });
        }

        function SubmitRating(user, gameID, ratingObjectType, value) {
            $.ajax({
                url: '/API/API_SetGameRating.php?i=' + gameID + '&u=' + user + '&t=' + ratingObjectType + '&v=' + value,
                dataType: 'json',
                success: function (results) {
                    GetRating(<?php echo $game->id; ?>);
                },
                error: function (temp, temp1, temp2) {
                    console.error("Error " + temp + temp1 + temp2);
                }
            });
        }

        //	Onload:
        $(function () {

            //	Add these handlers onload, they don't exist yet
            $('.starimg').hover(
                function () {
                    //	On hover

                    if ($(this).parent().is($('#ratingach'))) {
                        //	Ach:
                        var numStars = 0;
                        if ($(this).hasClass('1star'))
                            numStars = 1;
                        else if ($(this).hasClass('2star'))
                            numStars = 2;
                        else if ($(this).hasClass('3star'))
                            numStars = 3;
                        else if ($(this).hasClass('4star'))
                            numStars = 4;
                        else if ($(this).hasClass('5star'))
                            numStars = 5;

                        SetLitStars('#ratingach', numStars);
                    } else {
                        //	Game:
                        var numStars = 0;
                        if ($(this).hasClass('1star'))
                            numStars = 1;
                        else if ($(this).hasClass('2star'))
                            numStars = 2;
                        else if ($(this).hasClass('3star'))
                            numStars = 3;
                        else if ($(this).hasClass('4star'))
                            numStars = 4;
                        else if ($(this).hasClass('5star'))
                            numStars = 5;

                        SetLitStars('#ratinggame', numStars);
                    }
                },
                function () {
                    //	On leave
                    //GetRating( <?php echo $game->id; ?> );
                });

            $('.rating').hover(
                function () {
                    //	On hover
                },
                function () {
                    //	On leave
                    //GetRating( <?php echo $game->id; ?> );
                    if ($(this).is($('#ratingach')))
                        SetLitStars('#ratingach', lastKnownAchRating);
                    else
                        SetLitStars('#ratinggame', lastKnownGameRating);
                });

            $('.starimg').click(function () {

                var numStars = 0;
                if ($(this).hasClass('1star'))
                    numStars = 1;
                else if ($(this).hasClass('2star'))
                    numStars = 2;
                else if ($(this).hasClass('3star'))
                    numStars = 3;
                else if ($(this).hasClass('4star'))
                    numStars = 4;
                else if ($(this).hasClass('5star'))
                    numStars = 5;

                var ratingType = 1;
                if ($(this).parent().is($('#ratingach')))
                    ratingType = 3;

                SubmitRating("<?php echo $user->username ?? null; ?>", <?php echo $game->id; ?>, ratingType, numStars);
            });
            GetRating(<?php echo $game->id; ?>);
        });
    </script>
    */ ?>
@endpush
