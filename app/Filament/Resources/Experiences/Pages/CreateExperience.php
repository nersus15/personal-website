<?php

namespace App\Filament\Resources\Experiences\Pages;

use App\Filament\Resources\Experiences\ExperienceResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateExperience extends CreateRecord
{
    protected static string $resource = ExperienceResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('experience');
    }
}
