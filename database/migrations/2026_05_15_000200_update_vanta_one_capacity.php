<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('brands')
            ->where('subscription_tier', 'tier_1')
            ->where('vip_capacity', 50)
            ->update(['vip_capacity' => 20]);
    }

    public function down(): void
    {
        DB::table('brands')
            ->where('subscription_tier', 'tier_1')
            ->where('vip_capacity', 20)
            ->update(['vip_capacity' => 50]);
    }
};
