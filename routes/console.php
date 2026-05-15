<?php

use App\Models\VipClient;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('vanta:calculate-churn-risk', function () {
    VipClient::query()
        ->with(['brand', 'visitLogs'])
        ->where('is_active', true)
        ->whereHas('brand', fn ($query) => $query->whereIn('subscription_tier', ['tier_2', 'tier_3']))
        ->chunkById(100, function ($clients): void {
            foreach ($clients as $client) {
                $lastVisit = $client->visitLogs()->latest('visited_at')->value('visited_at');
                $visitsLast28Days = $client->visitLogs()->where('visited_at', '>=', now()->subDays(28))->count();
                $visitsLast14Days = $client->visitLogs()->where('visited_at', '>=', now()->subDays(14))->count();

                $status = 'healthy';
                $reason = 'Recent activity is within the expected range.';

                if (! $lastVisit && $client->created_at?->lt(now()->subDays(14))) {
                    $status = 'at_risk';
                    $reason = 'No VIP engagement recorded after onboarding.';
                } elseif ($visitsLast28Days >= 4 && $visitsLast14Days === 0) {
                    $status = 'at_risk';
                    $reason = 'Previously active VIP has no visits in the last 14 days.';
                } elseif ($visitsLast28Days <= 1) {
                    $status = 'watch';
                    $reason = 'Low engagement signal over the last 28 days.';
                }

                $client->forceFill([
                    'churn_risk_status' => $status,
                    'churn_risk_reason' => $reason,
                    'churn_checked_at' => now(),
                ])->save();
            }
        });

    $this->info('Vanta churn risk signals calculated.');
})->purpose('Calculate Vanta View churn-risk signals for Luxe and Noir brands');

Schedule::command('vanta:calculate-churn-risk')->dailyAt('02:00');
