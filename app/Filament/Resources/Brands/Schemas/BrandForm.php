<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Brand identity')
                ->description('Shape how this house appears across internal tools and public VIP moments.')
                ->icon(Heroicon::OutlinedBuildingStorefront)
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Brand name')
                        ->placeholder('Vanta Atelier')
                        ->prefixIcon(Heroicon::OutlinedSparkles)
                        ->required()
                        ->maxLength(255),
                    TextInput::make('slug')
                        ->label('Public slug')
                        ->placeholder('vanta-atelier')
                        ->helperText('Used for clean internal references and future public brand URLs.')
                        ->prefixIcon(Heroicon::OutlinedLink)
                        ->required()
                        ->alphaDash()
                        ->unique(ignoreRecord: true),
                    Textarea::make('description')
                        ->label('Brand note')
                        ->placeholder('Summarize the brand tone, service promise, and client experience.')
                        ->rows(5)
                        ->columnSpanFull(),
                    Toggle::make('is_active')
                        ->label('Active brand')
                        ->helperText('Inactive brands stay in the archive but are kept out of daily workflows.')
                        ->default(true),
                ]),
        ])->columns(1);
    }
}
