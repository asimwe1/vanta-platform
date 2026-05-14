<?php

namespace App\Filament\Resources\VipClients;

use App\Filament\Resources\VipClients\Pages\CreateVipClient;
use App\Filament\Resources\VipClients\Pages\EditVipClient;
use App\Filament\Resources\VipClients\Pages\ListVipClients;
use App\Filament\Resources\VipClients\Schemas\VipClientForm;
use App\Filament\Resources\VipClients\Tables\VipClientsTable;
use App\Models\VipClient;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VipClientResource extends Resource
{
    protected static ?string $model = VipClient::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $modelLabel = 'VIP profile';

    protected static ?string $pluralModelLabel = 'VIP profiles';

    protected static ?string $navigationLabel = 'VIP profiles';

    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return VipClientForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VipClientsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVipClients::route('/'),
            'create' => CreateVipClient::route('/create'),
            'edit' => EditVipClient::route('/{record}/edit'),
        ];
    }
}
