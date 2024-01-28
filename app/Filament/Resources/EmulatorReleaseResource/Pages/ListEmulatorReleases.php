<?php

declare(strict_types=1);

namespace App\Filament\Resources\EmulatorReleaseResource\Pages;

use App\Filament\Resources\EmulatorReleaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmulatorReleases extends ListRecords
{
    protected static string $resource = EmulatorReleaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
