<?php

declare(strict_types=1);

namespace App\Filament\Resources\IntegrationReleaseResource\Pages;

use App\Filament\Resources\IntegrationReleaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIntegrationRelease extends EditRecord
{
    protected static string $resource = IntegrationReleaseResource::class;

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
