<?php

declare(strict_types=1);

namespace App\Filament\Resources\MemoryNoteResource\Pages;

use App\Filament\Resources\MemoryNoteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemoryNotes extends ListRecords
{
    protected static string $resource = MemoryNoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
