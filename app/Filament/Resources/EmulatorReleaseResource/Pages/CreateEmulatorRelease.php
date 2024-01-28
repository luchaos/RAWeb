<?php

declare(strict_types=1);

namespace App\Filament\Resources\EmulatorReleaseResource\Pages;

use App\Filament\Resources\EmulatorReleaseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmulatorRelease extends CreateRecord
{
    protected static string $resource = EmulatorReleaseResource::class;
}
