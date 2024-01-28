<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerSessionResource\Pages;

use App\Filament\Resources\PlayerSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayerSessions extends ListRecords
{
    protected static string $resource = PlayerSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
