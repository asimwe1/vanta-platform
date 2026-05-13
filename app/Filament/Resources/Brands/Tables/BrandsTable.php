<?php

namespace App\Filament\Resources\Brands\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->heading('Brand houses')
            ->description('Manage the houses that anchor VIP profiles, service tone, and public client moments.')
            ->columns([
                TextColumn::make('name')
                    ->label('House')
                    ->description(fn ($record): ?string => $record->description ? str($record->description)->limit(72) : 'No brand note yet')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->copyable()
                    ->badge()
                    ->color('gray'),
                IconColumn::make('is_active')
                    ->label('Live')
                    ->boolean(),
                TextColumn::make('updated_at')
                    ->label('Last refined')
                    ->since()
                    ->sortable(),
            ])
            ->emptyStateIcon(Heroicon::OutlinedBuildingStorefront)
            ->emptyStateHeading('No brand houses yet')
            ->emptyStateDescription('Create the first brand house before adding VIP profiles.')
            ->recordActions([
                EditAction::make()
                    ->label('Refine'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Archive selected'),
                ]),
            ]);
    }
}
