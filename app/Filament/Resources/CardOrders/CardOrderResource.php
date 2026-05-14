<?php

namespace App\Filament\Resources\CardOrders;

use App\Filament\Resources\CardOrders\Pages\CreateCardOrder;
use App\Filament\Resources\CardOrders\Pages\EditCardOrder;
use App\Filament\Resources\CardOrders\Pages\ListCardOrders;
use App\Filament\Resources\CardOrders\Schemas\CardOrderForm;
use App\Filament\Resources\CardOrders\Tables\CardOrdersTable;
use App\Models\CardOrder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class CardOrderResource extends Resource
{
    protected static ?string $model = CardOrder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static ?string $modelLabel = 'card order';

    protected static ?string $pluralModelLabel = 'Card orders';

    protected static ?string $navigationLabel = 'Card orders';

    protected static string|UnitEnum|null $navigationGroup = 'Billing';

    protected static ?int $navigationSort = 30;

    public static function form(Schema $schema): Schema
    {
        return CardOrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CardOrdersTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()->with('brand');
        $user = auth()->user();

        if ($user && ! $user->isSuperAdmin()) {
            $query->where('brand_id', $user->brand_id);
        }

        return $query;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCardOrders::route('/'),
            'create' => CreateCardOrder::route('/create'),
            'edit' => EditCardOrder::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return ! (auth()->user()?->hasExpiredBrandSubscription() ?? false);
    }

    public static function canEdit(Model $record): bool
    {
        return ! (auth()->user()?->hasExpiredBrandSubscription() ?? false);
    }
}
