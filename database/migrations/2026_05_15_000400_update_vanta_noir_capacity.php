<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('brands')
            ->where('subscription_tier', 'tier_3')
            ->where(function ($query): void {
                $query->whereNull('vip_capacity')
                    ->orWhere('vip_capacity', 999999);
            })
            ->update(['vip_capacity' => 500]);
    }

    public function down(): void
    {
        DB::table('brands')
            ->where('subscription_tier', 'tier_3')
            ->where('vip_capacity', 500)
            ->update(['vip_capacity' => 999999]);
    }
};
