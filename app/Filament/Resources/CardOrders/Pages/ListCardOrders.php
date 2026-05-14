<?php

namespace App\Filament\Resources\CardOrders\Pages;

use App\Filament\Resources\CardOrders\CardOrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class ListCardOrders extends ListRecords
{
    protected static string $resource = CardOrderResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Card orders';
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Order cards')
                ->icon(Heroicon::Plus),
        ];
    }
}
