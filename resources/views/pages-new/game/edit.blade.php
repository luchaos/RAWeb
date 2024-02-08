@extends('game.page')

{{--@section('breadcrumb')
    @parent
    <li>
        {{ __('Edit') }}
    </li>
@endsection--}}

@section('main')
    {{--<x-section>
        <x-section-header>
            <x-slot name="title">
                <h2 class="mb-0">
                    <small class="text-secondary">{{ __('Edit') }}</small>
                    {{ $game->title }}
                </h2>
            </x-slot>
            <x-slot name="actions">
                <x-button.delete :model="$game"/>
                <x-button.cancel :model="$game"/>
            </x-slot>
        </x-section-header>
    </x-section>--}}
    <x-form :action="route('game.update', $game)" method="put">
        @include('game.form')
        <x-form-actions />
    </x-form>

    <?php /*
        <a href="/achievementinspector.php?g={{ $game->id }}">Manage Achievements</a>
        <a href="/leaderboardList.php?g={{ $game->id }}">Manage Leaderboards</a>
        {{--@if (!$game->achievements_count)--}}
        {{--<a href="/attemptmerge.php?g={{ $game->id }}">Merge Game</a>--}}
        {{--@endif--}}
        <a href="/attemptrename.php?g={{ $game->id }}">Rename Game</a>
        <a href="/attemptunlink.php?g={{ $game->id }}">Unlink Game</a>
        {{--@if ($numLeaderboards == 0)--}}
        {{----}}
        {{--<a href="/requestcreatenewlb.php?u={{ $user->username }}&amp;c={{ $cookie }}&amp;g={{ $game->id }}">Create--}}
        {{--First--}}
        {{--Leaderboard--}}
        {{--</a>--}}
        {{----}}
        {{--@endif--}}
        <a href="/request.php?r=recalctrueratio&amp;g={{ $game->id }}&amp;b=1">Recalculate True Ratios</a>

        <a href="/ticketmanager.php?g={{ $game->id }}&t=1">View open tickets for this game</a>
        <a href="/codenotes.php?g={{ $game->id }}">Code Notes</a>
        <br>
        Update title screenshot
        <form method="post" action="/uploadpic.php" enctype="multipart/form-data">
            <input type="hidden" name="i" value="{{ $game->id }}">
            <input type="hidden" name="t" value="GAME_TITLE">
            <input type="file" name="file" id="file">
            <input type="submit" name="submit" style="float: right;" value="Submit">
        </form>
        <br>
        Update ingame screenshot
        <form method="post" action="/uploadpic.php" enctype="multipart/form-data">
            <input type="hidden" name="i" value="{{ $game->id }}">
            <input type="hidden" name="t" value="GAME_INGAME">
            <input type="file" name="file" id="file">
            <input type="submit" name="submit" style="float: right;" value="Submit">
        </form>
        <br>
        Update game icon
        <form method="post" action="/uploadpic.php" enctype="multipart/form-data">
            <input type="hidden" name="i" value="{{ $game->id }}">
            <input type="hidden" name="t" value="GAME_ICON">
            <input type="file" name="file" id="file">
            <input type="submit" name="submit" style="float: right;" value="Submit">
        </form>
        <br>
        Update game boxart
        <form method="post" action="/uploadpic.php" enctype="multipart/form-data">
            <input type="hidden" name="i" value="{{ $game->id }}">
            <input type="hidden" name="t" value="GAME_BOXART">
            <input type="file" name="file" id="file">
            <input type="submit" name="submit" style="float: right;" value="Submit">
        </form>

        Similar Games
        <table>
            <tbody>
            @if (!empty($gameAlts))
                <tr>
                    <td>
                        <form method="post" action="/submitgamedata.php" enctype="multipart/form-data">
                            <input type="hidden" name="i" value="{{ $game->id }}">
                            To remove (game ID):
                            <select name="m">
                                <option value="0" selected>-</option>
                                @foreach ($gameAlts as $gameAlt)
                                    <?php
                                    $gameAltID = $gameAlt['gameIDAlt'];
                                    $gameAltTitle = $gameAlt['Title'];
                                    $gameAltSystem = $gameAlt['SystemName'];
                                    ?>
                                    <option value="{{ $gameAltID }}">
                                        {{ $gameAltTitle }} ({{ $gameAltSystem }})
                                    </option>
                                @endforeach
                            </select>
                            <input type="submit" style="float: right;" value="Remove">
                        </form>
                    </td>
                </tr>
            @endif
            <tr>
                <td>
                    <form method="post" action="/submitgamedata.php" enctype="multipart/form-data">
                        To add (game ID):
                        <input type="hidden" name="i" value="{{ $game->id }}">
                        <input type="text" name="n" class="searchboxgame">
                        <input type="submit" style="float: right;" value="Add">
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        */ ?>
@endsection
