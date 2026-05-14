<?php

namespace App\Filament\Resources\ServiceRequests\Tables;

use App\Support\DefaultSchemas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;

class ServiceRequestsTable
{
    public static function configure(Table $table): Table
    {
        $schema = auth()->user()?->brand?->form_schema ?: DefaultSchemas::general();

        return $table
            ->heading('Service request inbox')
            ->description('A single operational inbox for orders, reservations, bookings, and concierge inquiries.')
            ->columns([
                TextColumn::make('vipClient.full_name')
                    ->label('VIP client')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('brand.name')
                    ->label('Brand house')
                    ->badge()
                    ->color('warning')
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => str($state ?: 'inquiry')->headline()->toString()),
                ...collect($schema)
                    ->take(4)
                    ->map(fn (array $field): TextColumn => TextColumn::make('data_payload.' . ($field['variable_name'] ?? ''))
                        ->label($field['label'] ?? 'Field')
                        ->placeholder('—')
                        ->limit(32))
                    ->all(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed', 'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'warning',
                    }),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->since()
                    ->sortable(),
            ])
            ->emptyStateIcon(Heroicon::OutlinedInboxStack)
            ->emptyStateHeading('No service requests yet')
            ->emptyStateDescription('Verified VIP submissions will appear here after email OTP confirmation.')
            ->defaultSort('created_at', 'desc');
    }
}
