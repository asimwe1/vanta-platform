<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use App\Support\DefaultSchemas;
use App\Support\SubscriptionTiers;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class EditBrand extends EditRecord
{
    protected static string $resource = BrandResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Refine brand house';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('applyTemplate')
                ->label('Apply category template')
                ->icon(Heroicon::OutlinedSparkles)
                ->requiresConfirmation()
                ->modalHeading('Replace request fields?')
                ->modalDescription('This will replace the current dynamic fields with the default template for this brand category.')
                ->action(function (): void {
                    $this->record->update([
                        'form_schema' => DefaultSchemas::for($this->record->category),
                    ]);

                    $this->fillForm();

                    Notification::make()
                        ->success()
                        ->title('Template applied')
                        ->send();
                }),
            DeleteAction::make()
                ->label('Archive brand'),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Save refinements');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['color_config'] = [
            'primary' => $data['primary_color'] ?? '#BFA46F',
            'accent' => $data['accent_color'] ?? '#111111',
        ];

        $data['subscription_tier'] ??= 'tier_1';
        $data['vip_capacity'] ??= SubscriptionTiers::capacityFor($data['subscription_tier']) ?? 999999;
        $data['data_retention_days'] ??= SubscriptionTiers::retentionDaysFor($data['subscription_tier']) ?? 3650;

        return $data;
    }
}
