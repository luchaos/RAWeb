<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerAchievementResource\Pages;

use App\Filament\Resources\PlayerAchievementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayerAchievements extends ListRecords
{
    protected static string $resource = PlayerAchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
