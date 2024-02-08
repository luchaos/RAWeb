<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function __construct(
        public ?string $pageTitle = null,
        public ?string $pageDescription = null,
        public ?string $pageImage = null,
        public ?string $permalink = null,
        public ?string $pageType = null,
        public ?string $canonicalUrl = null,
        public string $sidebarPosition = 'right',
        public false $withoutMainWrappers = false,
    ) {
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
