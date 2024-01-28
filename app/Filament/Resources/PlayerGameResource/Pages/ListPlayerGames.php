<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerGameResource\Pages;

use App\Filament\Resources\PlayerGameResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayerGames extends ListRecords
{
    protected static string $resource = PlayerGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
