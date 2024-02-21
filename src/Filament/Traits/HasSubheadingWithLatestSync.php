<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Traits;

use Illuminate\Contracts\Support\Htmlable;

trait HasSubheadingWithLatestSync
{
    public function getSubheading(): string|Htmlable|null
    {
        return __('Last sync: ') . (new (self::$resource::getModel()))->latest()->first()?->updated_at->diffForHumans();
    }
}
