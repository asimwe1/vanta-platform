<?php

namespace App\Filament\Resources\CardOrders\Pages;

use App\Filament\Resources\CardOrders\CardOrderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditCardOrder extends EditRecord
{
    protected static string $resource = CardOrderResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Manage card order';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Archive order'),
        ];
    }
}
