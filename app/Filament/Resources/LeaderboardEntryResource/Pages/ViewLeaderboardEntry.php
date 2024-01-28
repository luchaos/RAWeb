<?php

declare(strict_types=1);

namespace App\Filament\Resources\LeaderboardEntryResource\Pages;

use App\Filament\Resources\LeaderboardEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLeaderboardEntry extends ViewRecord
{
    protected static string $resource = LeaderboardEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
