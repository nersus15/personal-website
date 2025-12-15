<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('contact');
    }
}
