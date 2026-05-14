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
                TextColumn::make('subscription_tier')
                    ->label('Retainer')
                    ->formatStateUsing(fn (?string $state): string => str($state ?: 'tier_1')->replace('_', ' ')->title())
                    ->badge()
                    ->color('warning'),
                TextColumn::make('vip_capacity')
                    ->label('Capacity')
                    ->description(fn ($record): string => $record->vipClients()->count() . ' VIPs active')
                    ->sortable(),
                TextColumn::make('card_stock_remaining')
                    ->label('Cards')
                    ->badge()
                    ->color(fn ($state): string => $state < 5 ? 'danger' : 'success')
                    ->sortable(),
                TextColumn::make('subscription_end_date')
                    ->label('SLA ends')
                    ->date()
                    ->sortable(),
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
