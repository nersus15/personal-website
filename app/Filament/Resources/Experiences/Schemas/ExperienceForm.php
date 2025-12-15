<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('company')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('from')
                    ->required(),
                DatePicker::make('until')
                    ->nullable(),
                TextInput::make('status')
                    ->nullable(),
            ]);
    }
}
