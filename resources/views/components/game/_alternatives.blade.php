@if (!empty($gameAlts))
    <x-section>
        <h4>Similar Games</h4>
        <table>
            <tbody>
            @foreach($gameAlts as $game)
                <tr>
                    <td>
                        <x-game.avatar :game="$game" display="icon" />
                    </td>
                    <td>
                        <x-game.avatar :game="$game" />
                    </td>
                    <td>
                        {{ $game->points_total }} points
                        {{--<span> ({{ $gameAlt->points_weighted }})</span>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-section>
@endif
