<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use App\Support\BrandAdminProvisioner;
use App\Support\DefaultSchemas;
use App\Support\SubscriptionTiers;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;
use Throwable;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    protected ?array $brandAdminAccess = null;

    public function getTitle(): string|Htmlable
    {
        return 'Create brand house';
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Create brand house');
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Create and add another');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->brandAdminAccess = BrandAdminProvisioner::extractAccessData($data);

        if (blank($data['form_schema'] ?? null)) {
            $data['form_schema'] = DefaultSchemas::for($data['category'] ?? 'general');
        }

        $data['color_config'] ??= [
            'primary' => $data['primary_color'] ?? '#BFA46F',
            'accent' => $data['accent_color'] ?? '#111111',
        ];

        $data['subscription_tier'] ??= 'tier_1';
        $data['vip_capacity'] ??= SubscriptionTiers::capacityFor($data['subscription_tier']) ?? 500;
        $data['data_retention_days'] ??= SubscriptionTiers::retentionDaysFor($data['subscription_tier']) ?? 3650;
        $data['branding_visible'] ??= $data['subscription_tier'] === 'tier_1';

        return $data;
    }

    protected function afterCreate(): void
    {
        try {
            $result = BrandAdminProvisioner::provision($this->record, $this->brandAdminAccess);
        } catch (Throwable $exception) {
            report($exception);

            Notification::make()
                ->danger()
                ->title('Brand admin email was not sent')
                ->body('The brand was created, but the welcome email failed. Check the mail settings, then edit the brand and resend the admin password.')
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
