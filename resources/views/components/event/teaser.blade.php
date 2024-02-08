<?php
// TODO: finish refactoring - aotw -> events of type aotw, with migrations, controllers, views and all
// $staticData = \RA\Site\Models\StaticData::first();
// function RenderAOTWComponent( $achID, $forumTopicID )
// RenderAOTWComponent($staticData['Event_AOTW_AchievementID'], $staticData['Event_AOTW_ForumID']);

// if(!$staticData) {
//     return;
// }

// TODO: $event->achievement
// TODO: $event->game
$achievement = null;

// $aotwAchievement = \App\Models\Achievement::find($staticData->aotw_achievement_id);
// $aotwForumTopic = \RA\Forum\Models\ForumTopic::find($staticData->aotw_forum_topic_id);

if (!$achievement) {
    return;
}
$game = $achievement->game;
?>
<x-section>
    <h4>{{ __('event.aotw.title') }}</h4>
    <div class="embedded p-3 mb-3">
        <p>
            <x-game.avatar :game="$game" display="icon" />
            <x-game.avatar :game="$game" />
        </p>
        <p class="m-0">
            <x-achievement.avatar :achievement="$achievement" display="icon" />
            <x-achievement.avatar :achievement="$achievement" />
        </p>
    </div>
    <div class="text-right">
        <a class="btn btn-block btn-primary" href="{{ route('forum-topic.show', $aotwForumTopic) }}">
            Join this tournament!
        </a>
    </div>
</x-section>
