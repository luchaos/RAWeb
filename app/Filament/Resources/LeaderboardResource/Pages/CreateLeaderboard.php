<?php

declare(strict_types=1);

namespace App\Filament\Resources\LeaderboardResource\Pages;

use App\Filament\Resources\LeaderboardResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLeaderboard extends CreateRecord
{
    protected static string $resource = LeaderboardResource::class;
}
