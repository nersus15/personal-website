<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('text')
                    ->required(),
                TextInput::make('link')
                    ->url()
                    ->nullable(),
                TextInput::make('icon')
                    ->nullable(),
            ]);
    }
}
