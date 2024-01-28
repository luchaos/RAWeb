<?php

declare(strict_types=1);

namespace App\Filament\Resources\IntegrationReleaseResource\Pages;

use App\Filament\Resources\IntegrationReleaseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIntegrationRelease extends CreateRecord
{
    protected static string $resource = IntegrationReleaseResource::class;
}
