<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlayerSessionResource\Pages;

use App\Filament\Resources\PlayerSessionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePlayerSession extends CreateRecord
{
    protected static string $resource = PlayerSessionResource::class;
}
