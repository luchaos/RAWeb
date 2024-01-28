<?php

declare(strict_types=1);

namespace App\Filament\Resources\EmulatorReleaseResource\Pages;

use App\Filament\Resources\EmulatorReleaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmulatorRelease extends EditRecord
{
    protected static string $resource = EmulatorReleaseResource::class;

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
