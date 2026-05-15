<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('subscription_tier')->default('tier_1')->after('subscription_status');
            $table->unsignedInteger('vip_capacity')->default(20)->after('subscription_tier');
            $table->date('subscription_end_date')->nullable()->after('vip_capacity');
            $table->unsignedInteger('card_stock_remaining')->default(0)->after('subscription_end_date');
            $table->unsignedSmallInteger('data_retention_days')->default(30)->after('card_stock_remaining');
        });
    }

    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn([
                'subscription_tier',
                'vip_capacity',
                'subscription_end_date',
                'card_stock_remaining',
                'data_retention_days',
            ]);
        });
    }
};
