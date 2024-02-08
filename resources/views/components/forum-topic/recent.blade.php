<x-comment.recent :comments="\App\Models\Comment::recent()->take($take ?? 4)->get()"
                  :moreLink="route('forum-topic.comment.index')"
/>
