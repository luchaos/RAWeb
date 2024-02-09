<?php

declare(strict_types=1);

namespace App\Filament\Resources\ForumResource\Pages;

use App\Filament\Resources\ForumResource;
use Filament\Resources\Pages\CreateRecord;

class CreateForum extends CreateRecord
{
    protected static string $resource = ForumResource::class;
}
