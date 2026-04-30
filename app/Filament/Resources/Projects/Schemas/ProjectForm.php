<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('stack')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('position')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->nullable(),
                TextInput::make('link')
                    ->url()
                    ->nullable(),
                TextInput::make('repo')
                    ->url()
                    ->nullable(),
            ]);
    }
}
