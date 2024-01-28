<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerAchievementResource\Pages;

use App\Filament\Resources\PlayerAchievementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerAchievement extends EditRecord
{
    protected static string $resource = PlayerAchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
