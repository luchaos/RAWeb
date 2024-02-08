<div>
    @foreach($achievements as $achievement)
        <x-achievement.avatar :achievement="$achievement" display="icon" :unlockState="true" />
    @endforeach
</div>
