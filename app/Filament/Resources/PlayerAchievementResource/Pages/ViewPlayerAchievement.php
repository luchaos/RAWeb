<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerAchievementResource\Pages;

use App\Filament\Resources\PlayerAchievementResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPlayerAchievement extends ViewRecord
{
    protected static string $resource = PlayerAchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
