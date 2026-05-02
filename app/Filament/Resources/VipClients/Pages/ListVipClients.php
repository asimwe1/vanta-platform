<?php

namespace App\Filament\Resources\VipClients\Pages;

use App\Filament\Resources\VipClients\VipClientResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVipClients extends ListRecords
{
    protected static string $resource = VipClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
