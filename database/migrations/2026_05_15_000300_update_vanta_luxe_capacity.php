<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('brands')
            ->where('subscription_tier', 'tier_2')
            ->where('vip_capacity', 250)
            ->update(['vip_capacity' => 125]);
    }

    public function down(): void
    {
        DB::table('brands')
            ->where('subscription_tier', 'tier_2')
            ->where('vip_capacity', 125)
            ->update(['vip_capacity' => 250]);
    }
};
