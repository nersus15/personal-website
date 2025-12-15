<?php

namespace App\Filament\Resources\Teches\Pages;

use App\Filament\Resources\Teches\TechResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateTech extends CreateRecord
{
    protected static string $resource = TechResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('tech');
    }
}
