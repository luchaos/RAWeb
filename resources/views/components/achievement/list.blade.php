<?php
$achievements ??= [];
$playerCount ??= null;
?>
<div>
    @foreach($achievements as $achievement)
        <x-achievement.list-item :achievement="$achievement" :players="$playerCount" iconSize="md" showPoints />
    @endforeach
</div>
