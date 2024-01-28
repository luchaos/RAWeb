<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerGameResource\Pages;

use App\Filament\Resources\PlayerGameResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerGame extends EditRecord
{
    protected static string $resource = PlayerGameResource::class;

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
