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

    public function mount(): void
    {
        parent::mount();

        $user = auth()->user();

        if ($user && ! $user->isSuperAdmin() && $user->brand_id !== null) {
            $this->redirect(
                BrandResource::getUrl('edit', ['record' => $user->brand_id]),
                navigate: true,
            );
        }
    }

    public function getTitle(): string|Htmlable
    {
        return auth()->user()?->isSuperAdmin() ? 'Brand houses' : 'Brand details';
    }

    protected function getHeaderActions(): array
    {
        if (! (auth()->user()?->isSuperAdmin() ?? false)) {
            return [];
        }

        return [
            CreateAction::make()
                ->label('New brand house')
                ->icon(Heroicon::Plus),
        ];
    }
}
