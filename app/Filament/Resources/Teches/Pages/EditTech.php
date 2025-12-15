<?php

namespace App\Filament\Resources\Teches\Pages;

use App\Filament\Resources\Teches\TechResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditTech extends EditRecord
{
    protected static string $resource = TechResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Cache::forget('tech');
    }

    protected function afterDelete(): void
    {
        Cache::forget('tech');
    }
}
