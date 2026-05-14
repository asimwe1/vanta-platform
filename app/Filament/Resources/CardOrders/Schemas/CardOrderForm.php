<?php

namespace App\Filament\Resources\CardOrders\Schemas;

use App\Models\Brand;
use App\Support\CardDesigns;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CardOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = auth()->user();

        return $schema->components([
            Section::make('Card procurement')
                ->description('Order replenishment stock or request a bespoke card design quote.')
                ->icon(Heroicon::OutlinedCreditCard)
                ->columns(2)
                ->schema([
                    Select::make('brand_id')
                        ->label('Brand house')
                        ->options(fn () => Brand::query()->orderBy('name')->pluck('name', 'id'))
                        ->default($user && ! $user->isSuperAdmin() ? $user->brand_id : null)
                        ->disabled(fn () => $user && ! $user->isSuperAdmin())
                        ->dehydrated()
                        ->searchable()
                        ->preload()
                        ->required(),
                    TextInput::make('quantity')
                        ->label('Quantity')
                        ->numeric()
                        ->minValue(10)
                        ->step(5)
                        ->default(20)
                        ->required(),
                    Select::make('design_type')
                        ->label('Design')
                        ->options(CardDesigns::options())
                        ->default('matte_black')
                        ->live()
                        ->required(),
                    Select::make('status')
                        ->label('Order status')
                        ->options([
                            'pending' => 'Pending quote',
                            'approved' => 'Approved',
                            'production' => 'In production',
                            'shipped' => 'Shipped',
                            'fulfilled' => 'Fulfilled',
                            'cancelled' => 'Cancelled',
                        ])
                        ->default('pending')
                        ->required(),
                    FileUpload::make('custom_artwork_path')
                        ->label('Custom artwork or logo')
                        ->directory('card-artwork')
                        ->visible(fn ($get): bool => $get('design_type') === 'custom')
                        ->columnSpanFull(),
                    Textarea::make('notes')
                        ->label('Order notes')
                        ->placeholder('Finish, engraving notes, deadline, delivery handoff, or quote instructions.')
                        ->rows(5)
                        ->columnSpanFull(),
                ]),
        ])->columns(1);
    }
}
