<x-input.roles :model="$user" attribute="roles[]" />
<?php /*
@if(request()->user() != $user && request()->user()->role_id >= $user->role_id)
    <li>Update Account Type:</li>
    <form method="post" action="/requestupdateuser.php" enctype="multipart/form-data">
        <input type="hidden" name="p" value="0">
        <input type="hidden" name="t" value="{{ $user->username }}">
        <select name="v">
            <?php $i = \RA\Site\Models\Role::Banned; ?>
             NB. Only I can authorise changing to Admin
             Don't do this, looks weird when trying to change someone above you
            //while( $i <= $user->role_id && ( $i <= \RA\Site\Models\Role::Developer || $user == 'Scott' ) )
            @while( $i <= request()->user()->role_id )
                @if( $user->role_id == $i )
                    <option value="$i" selected>
                        ({{ $i }}): {{ translate_role( $i ) }} (current)
                    </option>
                @else
                    <option value="$i">({{ $i }}): {{ translate_role( $i )  }}</option>
                @endif
                <?php $i++; ?>
            @endwhile
        </select>
        <input type="submit" style="float: right;" value="Do it!"><br><br>
        <div style="clear:both;"></div>
    </form><br>
@endif

@if(request()->user()->role_id >= \RA\Site\Models\Role::Root )
    <form method="post" action="/requestupdateuser.php" enctype="multipart/form-data">
        <input type="hidden" name="p" value="2">
        <input type="hidden" name="t" value="{{ $user->username }}">
        <input type="hidden" name="v" value="0">
        <input type="submit" style="float: right;" value="Toggle Patreon Supporter"><br><br>
        <div style="clear:both;"></div>
    </form>
@endif

@if( request()->user()->role_id >= \RA\Site\Models\Role::Admin )
    <form method="post" action="/requestscorerecalculation.php" enctype="multipart/form-data">
        <input type="hidden" NAME="u" VALUE="{{ $user->username }}">
        <input type="submit" style="float: right;" value="Recalc Score Now"><br><br>
        <div style="clear:both;"></div>
    </form>
    @if($user->unranked)
        <b>Unranked User!</b>
    @else
        Tracked User.
    @endif
    <form method="post" action="/requestupdateuser.php" enctype="multipart/form-data">
        <input type="hidden" NAME="p" VALUE="3">
        <input type="hidden" NAME="t" VALUE="{{ $user->username }}">
        <input type="hidden" NAME="v" VALUE="{{ !$user->unranked }}">
        <input type="submit" style="float: right;" value="Toggle Tracked Status"><br><br>
        <div style="clear:both;"></div>
    </form>
@endif
*/?>
