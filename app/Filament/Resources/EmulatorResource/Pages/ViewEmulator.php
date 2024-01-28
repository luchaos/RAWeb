<?php

declare(strict_types=1);

namespace App\Filament\Resources\EmulatorResource\Pages;

use App\Filament\Resources\EmulatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEmulator extends ViewRecord
{
    protected static string $resource = EmulatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
