<?php

namespace App\Filament\Resources\CardOrders\Tables;

use App\Support\CardDesigns;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CardOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->heading('Card orders')
            ->description('Track physical metal card replenishment and custom card design requests.')
            ->columns([
                TextColumn::make('brand.name')
                    ->label('Brand house')
                    ->sortable()
                    ->searchable()
                    ->weight('semibold'),
                TextColumn::make('quantity')
                    ->label('Cards')
                    ->sortable(),
                TextColumn::make('design_type')
                    ->label('Design')
                    ->formatStateUsing(fn (?string $state): string => CardDesigns::options()[$state] ?? str($state)->headline())
                    ->badge()
                    ->color(fn (?string $state): string => $state === 'custom' ? 'warning' : 'gray'),
                TextColumn::make('quoted_total')
                    ->label('Quote')
                    ->money('USD')
                    ->placeholder('Manual quote'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved', 'production' => 'warning',
                        'shipped' => 'info',
                        'fulfilled' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Ordered')
                    ->since()
                    ->sortable(),
            ])
            ->emptyStateIcon(Heroicon::OutlinedCreditCard)
            ->emptyStateHeading('No card orders yet')
            ->emptyStateDescription('Create a replenishment order when a brand needs more physical VIP cards.')
            ->recordActions([
                EditAction::make()
                    ->label('Manage'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Archive selected'),
                ]),
            ]);
    }
}
