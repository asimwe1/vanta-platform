<?php

namespace App\Filament\Resources\ServiceRequests;

use App\Filament\Resources\ServiceRequests\Pages\ListServiceRequests;
use App\Filament\Resources\ServiceRequests\Tables\ServiceRequestsTable;
use App\Models\ServiceRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ServiceRequestResource extends Resource
{
    protected static ?string $model = ServiceRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxStack;

    protected static ?string $modelLabel = 'service request';

    protected static ?string $pluralModelLabel = 'Service requests';

    protected static ?string $navigationLabel = 'Service requests';

    protected static ?int $navigationSort = 15;

    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return ServiceRequestsTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()->with(['brand', 'vipClient']);
        $user = auth()->user();

        if ($user && ! $user->isSuperAdmin()) {
            $query->where('brand_id', $user->brand_id);
        }

        return $query;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceRequests::route('/'),
        ];
    }
}
