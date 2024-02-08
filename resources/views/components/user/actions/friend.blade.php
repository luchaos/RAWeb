@can('befriend', $user)
    {{--
    @if( $userMassData[ 'Friendship' ] == 1 )
        @if( $userMassData[ 'FriendReciprocation' ] == 1 )
            <a class="btn"
               href="/requestchangefriend.php?u=$user&c={{ $user->cookie }}&f={{ $user->username }}&a=0">
                Remove friend
            </a>
        @elseif( $userMassData[ 'FriendReciprocation' ] == 0 )
            --}}
    {{--They haven't accepted yet--}}{{--

            <a class="btn"
               href="/requestchangefriend.php?u=$user&c={{ $user->cookie }}&f={{ $user->username }}&a=0">
                Cancel friend request
            </a>
        @elseif( $userMassData[ 'FriendReciprocation' ] == -1 )
            --}}
    {{--They blocked us--}}{{--

            <a class="btn"
               href="/requestchangefriend.php?u=$user&c={{ $user->cookie }}&f={{ $user->username }}&a=0">
                Remove friend
            </a>
        @endif
    @elseif( $userMassData[ 'Friendship' ] == 0 )
        @if( $userMassData[ 'FriendReciprocation' ] == 1 )
            <a class="btn"
               href="/requestchangefriend.php?u=$user&c={{ $user->cookie }}&f={{ $user->username }}&a=1">
                Confirm friend request
            </a>
        @elseif( $userMassData[ 'FriendReciprocation' ] == 0 )
            <a class="btn"
               href="/requestchangefriend.php?u=$user&c={{ $user->cookie }}&f={{ $user->username }}&a=1"
               data-toggle="tooltip" title="Add friend">
                <x-fas-plus/>
                <x-fas-user/>
            </a>
        @endif
    @endif
    @if( $userMassData[ 'Friendship' ] !== -1 )
        <a class="btn"
           href="/requestchangefriend.php?u=$user&c={{ $user->cookie }}&f={{ $user->username }}&a=-1"
           data-toggle="tooltip" title="Block">
            <x-fas-ban/>
            <x-fas-user/>
        </a>
    @else
        --}}
    {{--//if( $userMassData['Friendship'] == -1 )--}}{{--

        <a class="btn"
           href="/requestchangefriend.php?u=$user&c={{ $user->cookie }}&f={{ $user->username }}&a=0">
            Unblock
        </a>
    @endif
    --}}
@endcan
