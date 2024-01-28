<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerGameResource\Pages;

use App\Filament\Resources\PlayerGameResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePlayerGame extends CreateRecord
{
    protected static string $resource = PlayerGameResource::class;
}
