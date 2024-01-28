<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Models\Event;
use Filament\Pages\Page;

class Events extends Page
{
    protected static ?string $navigationIcon = 'fas-calendar-day';

    protected static string $view = 'filament.pages.events';

    protected static ?string $navigationGroup = 'Community';

    protected static ?int $navigationSort = 1;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('mange', Event::class);
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->can('mange', Event::class), 403);
    }
}
