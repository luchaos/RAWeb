<?php

declare(strict_types=1);

namespace App\Filament\Resources\MemoryNoteResource\Pages;

use App\Filament\Resources\MemoryNoteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMemoryNote extends CreateRecord
{
    protected static string $resource = MemoryNoteResource::class;
}
