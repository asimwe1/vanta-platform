<?php

namespace App\Filament\Resources\VipClients\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\URL;

class VipClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->heading('VIP profiles')
            ->description('Curate the private client records that power public profiles and concierge follow-up.')
            ->columns([
                TextColumn::make('full_name')
                    ->label('Client')
                    ->description(fn ($record): string => $record->email ?: 'No email captured')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('brand.name')
                    ->label('Brand house')
                    ->sortable()
                    ->badge()
                    ->color('warning'),
                TextColumn::make('membership_code')
                    ->label('Code')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('slug')
                    ->label('Public slug')
                    ->copyable()
                    ->color('gray'),
                IconColumn::make('is_active')
                    ->label('Public')
                    ->boolean(),
            ])
            ->emptyStateIcon(Heroicon::OutlinedUserGroup)
            ->emptyStateHeading('No VIP profiles yet')
            ->emptyStateDescription('Create the first VIP profile and connect it to a brand house.')
            ->recordActions([
                Action::make('magicLink')
                    ->label('Magic link')
                    ->icon(Heroicon::OutlinedLink)
                    ->modalHeading('VIP magic link')
                    ->modalWidth(Width::Large)
                    ->modalSubmitAction(false)
                    ->modalContent(fn ($record) => view('filament.actions.magic-link', [
                        'url' => URL::temporarySignedRoute(
                            'vip.profile.show',
                            now()->addDays(30),
                            ['slug' => $record->slug],
                        ),
                    ])),
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
