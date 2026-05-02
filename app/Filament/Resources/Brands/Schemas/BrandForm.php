<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required()->maxLength(255),
            TextInput::make('slug')->required()->alphaDash()->unique(ignoreRecord: true),
            Textarea::make('description')->rows(4)->columnSpanFull(),
            Toggle::make('is_active')->default(true),
        ]);
    }
}
