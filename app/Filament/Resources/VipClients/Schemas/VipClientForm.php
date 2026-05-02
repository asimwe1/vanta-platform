<?php

namespace App\Filament\Resources\VipClients\Schemas;

use App\Models\Brand;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VipClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('brand_id')->label('Brand')->options(Brand::query()->pluck('name', 'id'))->searchable()->required(),
            TextInput::make('full_name')->required()->maxLength(255),
            TextInput::make('slug')->required()->alphaDash()->unique(ignoreRecord: true),
            TextInput::make('membership_code')->required()->unique(ignoreRecord: true),
            TextInput::make('email')->email(),
            TextInput::make('phone')->tel(),
            Toggle::make('is_active')->default(true),
            Textarea::make('notes')->rows(4)->columnSpanFull(),
        ]);
    }
}
