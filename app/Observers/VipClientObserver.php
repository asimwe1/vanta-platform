<?php

namespace App\Observers;

use App\Models\VipClient;
use Illuminate\Validation\ValidationException;

class VipClientObserver
{
    public function creating(VipClient $vipClient): void
    {
        $brand = $vipClient->brand;

        if (! $brand || blank($brand->vip_capacity)) {
            return;
        }

        if ($brand->vipClients()->count() >= $brand->vip_capacity) {
            throw ValidationException::withMessages([
                'brand_id' => 'VIP capacity reached for this brand. Contact APHEZIS to upgrade the retainer tier.',
            ]);
        }
    }

    public function created(VipClient $vipClient): void
    {
        $brand = $vipClient->brand;

        if (! $brand || $brand->card_stock_remaining < 1) {
            return;
        }

        $brand->decrement('card_stock_remaining');
    }
}
