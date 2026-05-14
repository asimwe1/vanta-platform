<?php

namespace App\Filament\Resources\VipClients\Pages;

use App\Filament\Resources\VipClients\VipClientResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditVipClient extends EditRecord
{
    protected static string $resource = VipClientResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Refine VIP profile';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Archive profile'),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Save refinements');
    }
}
