<?php

use App\Community\Enums\ArticleType;
use App\Community\Enums\TicketState;
use App\Site\Enums\Permissions;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

if (!authenticateFromCookie($user, $permissions, $userDetails, Permissions::Registered)) {
    return back()->withErrors(__('legacy.error.permissions'));
}

$input = Validator::validate(Arr::wrap(request()->post()), [
    'body' => 'required|string|max:2000',
    'commentable_id' => 'required|integer',
    'commentable_type' => 'required|integer',
]);

$articleID = (int) $input['commentable_id'];
$articleType = (int) $input['commentable_type'];

if (addArticleComment($user, $articleType, $articleID, $input['body'])) {
    // if a user is responding to a ticket in the Request state,
    // automatically change the state back to Open
    if ($articleType === ArticleType::AchievementTicket) {
        $ticketData = getTicket($articleID);
        if ($ticketData['ReportState'] == TicketState::Request && $ticketData['ReportedBy'] == $user) {
            updateTicket($user, $articleID, TicketState::Open);
        }
    }

    return back()->with('success', __('legacy.success.send'));
}

return back()->withErrors(__('legacy.error.error'));
