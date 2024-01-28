<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerGameResource\Pages;

use App\Filament\Resources\PlayerGameResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPlayerGame extends ViewRecord
{
    protected static string $resource = PlayerGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
