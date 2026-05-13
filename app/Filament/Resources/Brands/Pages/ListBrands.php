<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Brand houses';
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('New brand house')
                ->icon(Heroicon::Plus),
        ];
    }
}
