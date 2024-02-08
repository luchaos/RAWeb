<x-section>
    <h4>Leaderboards</h4>
    @if($leaderboards->isEmpty())
        {{-- <p>
             No leaderboards found.<br>
             Why not suggest some for this game?
         </p>--}}
        {{--<div class="text-right">
            <a class="btn btn-sm embedded" href="{{ route('leaderboard.index') }}">
                Leaderboards
            </a>
        </div>--}}
    @else
        <table class="table table-striped table-hover table-sm">
            <tbody>
            @foreach($leaderboards as $leaderboard)
                <div>
                    <a href="{{ route('leaderboard.show', $leaderboard) }}">
                        {{ $leaderboard->title }}
                    </a>
                </div>
                <div>
                    {{ $leaderboard->description }}
                </div>
                <tr>
                    <td>
                        <x-user.avatar :user="$leaderboard->best_score_user" display="icon" />
                        <x-user.avatar :user="$leaderboard->best_score_user" />
                    </td>
                    <td>
                        <a href="{{ route('leaderboard.show', $leaderboard) }}">
                            {{ GetFormattedLeaderboardEntry($leaderboard->format, $leaderboard->score) }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</x-section>
