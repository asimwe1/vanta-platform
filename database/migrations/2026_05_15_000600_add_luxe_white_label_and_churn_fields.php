<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table): void {
            if (! Schema::hasColumn('brands', 'branding_visible')) {
                $table->boolean('branding_visible')->default(true);
            }
        });

        Schema::table('vip_clients', function (Blueprint $table): void {
            if (! Schema::hasColumn('vip_clients', 'churn_risk_status')) {
                $table->string('churn_risk_status')->default('unscored');
            }

            if (! Schema::hasColumn('vip_clients', 'churn_risk_reason')) {
                $table->string('churn_risk_reason')->nullable();
            }

            if (! Schema::hasColumn('vip_clients', 'churn_checked_at')) {
                $table->timestamp('churn_checked_at')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('vip_clients', function (Blueprint $table): void {
            foreach (['churn_risk_status', 'churn_risk_reason', 'churn_checked_at'] as $column) {
                if (Schema::hasColumn('vip_clients', $column)) {
                    $table->dropColumn($column);
                }
            }
        });

        Schema::table('brands', function (Blueprint $table): void {
            if (Schema::hasColumn('brands', 'branding_visible')) {
                $table->dropColumn('branding_visible');
            }
        });
    }
};
