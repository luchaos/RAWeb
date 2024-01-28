<?php

declare(strict_types=1);

namespace App\Filament\Resources\MemoryNoteResource\Pages;

use App\Filament\Resources\MemoryNoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemoryNote extends EditRecord
{
    protected static string $resource = MemoryNoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
