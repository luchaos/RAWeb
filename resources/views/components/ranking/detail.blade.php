<?php

use RA\Site\Models\User;

$friendsOnly = (request()->user() && !empty($friendsOnly)) ?? false;
$count ??= 5;
$user = request()->user();
// $userRank = $user ? getUserRank($user->username) : 0;
$userRank = 0;

if (request()->user()) {
    // $userRank = request()->user()->rank;
}

// $count = getTopUsersByScore($count, $dataArray, ($friendsOnly == TRUE) && $user ? $user->username : NULL);
?>
<x-section>
    @if($friendsOnly)
        <h4>Friends Ranking</h4>
        @if( $count == 0 )
            You don't appear to have friends registered here yet. Why not leave a comment on the <a href="/forum.php">forums</a>
            or <a href="/userList.php">browse the user pages</a> to find someone to add to your friend list?<br>
        @endif
    @else
        <h4>Global Ranking</h4>
    @endif
    <div class="table-responsive">
        <table class="table table-sm table-striped">
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<th>Rank</th>--}}
            {{--<th colspan="2">User</th>--}}
            {{--<th>Points</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            <tbody>
            @foreach( $dataArray as $nextUser )
                <?php
                $userModel = new User([
                    'username' => $dataArray[$loop->index][1],
                    'RAPoints' => $dataArray[$loop->index][2],
                    'TruePoints' => $dataArray[$loop->index][3],
                ]);
                ?>
                <tr>
                    <td>
                        <b>
                            #{{ $loop->index + 1 }}
                        </b>
                    </td>
                    <td class="userimage">
                        <img alt="$nextUser" title="$nextUser" src="{{ asset($userModel->avatar) }}" width="24"
                             height="24">
                    </td>
                    <td class="w-75">
                        <div class="fixedsize">
                            <a href="{{ route('user.show', $userModel) }}">
                                {{ $userModel->username }}
                            </a>
                        </div>
                    </td>
                    <td class="text-right">
                        {{ $userModel->points }} <span>({{ $userModel->truePoints }})</span>
                    </td>
                </tr>
            @endforeach
            @if($user && !$friendsOnly)
                <tr>
                    <td>#{{ $userRank }}</td>
                    <td>
                        <img alt="{{ $user->username }}" title="{{ $user->username }}" src="{{ $user->avatarUrl }}"
                             width="24" height="24">
                    </td>
                    <td class="user"><a href="{{ route('user.show', $user) }}">{{ $user->username }}</a></td>
                    <td class="text-right">{{ $user->points ?? 0 }}</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="text-right">
        @if( !$friendsOnly )
            <span class="btn btn-sm embedded"><a href="{{ route('user.index') }}?s=2">more &hellip;</a></span>
        @else
            <span class="btn btn-sm embedded"><a href="{{ route('friend.index') }}">more &hellip;</a></span>
        @endif
    </div>
</x-section>
