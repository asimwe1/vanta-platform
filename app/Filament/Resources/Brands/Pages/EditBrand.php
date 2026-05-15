<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use App\Support\BrandAdminProvisioner;
use App\Support\DefaultSchemas;
use App\Support\SubscriptionTiers;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use Throwable;

class EditBrand extends EditRecord
{
    protected static string $resource = BrandResource::class;

    protected ?array $brandAdminAccess = null;

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
        $this->brandAdminAccess = BrandAdminProvisioner::extractAccessData($data);

        $data['color_config'] = [
            'primary' => $data['primary_color'] ?? '#BFA46F',
            'accent' => $data['accent_color'] ?? '#111111',
        ];

        $data['subscription_tier'] ??= 'tier_1';
        $data['vip_capacity'] ??= SubscriptionTiers::capacityFor($data['subscription_tier']) ?? 500;
        $data['data_retention_days'] ??= SubscriptionTiers::retentionDaysFor($data['subscription_tier']) ?? 3650;
        $data['branding_visible'] ??= $data['subscription_tier'] === 'tier_1';

        return $data;
    }

    protected function afterSave(): void
    {
        try {
            $result = BrandAdminProvisioner::provision($this->record, $this->brandAdminAccess);
        } catch (Throwable $exception) {
            report($exception);

            Notification::make()
                ->danger()
                ->title('Brand admin email was not sent')
                ->body('The brand was saved, but the welcome email failed. Check the mail settings, then resend the admin password.')
                ->send();

            return;
        }

        if (! $result) {
            return;
        }

        Notification::make()
            ->success()
            ->title($result['created'] ? 'Brand admin created' : 'Brand admin updated')
            ->body($result['mailed']
                ? 'The Vanta welcome email was sent to ' . $result['email'] . ($result['mailer'] === 'log' ? '. MAIL_MAILER is log, so it was written to the Laravel log instead of a real inbox.' : '.')
                : 'The brand admin account was updated without sending a new password.')
            ->send();
    }
}
