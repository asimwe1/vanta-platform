<?php

namespace App\Filament\Resources\CardOrders\Pages;

use App\Filament\Resources\CardOrders\CardOrderResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateCardOrder extends CreateRecord
{
    protected static string $resource = CardOrderResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Order VIP cards';
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Submit card order');
    }
}
