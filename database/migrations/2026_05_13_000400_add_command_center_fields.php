<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('category')->default('general')->after('slug');
            $table->json('form_schema')->nullable()->after('accent_color');
            $table->json('color_config')->nullable()->after('form_schema');
            $table->string('subscription_status')->default('active')->after('is_active');
        });

        Schema::table('vip_clients', function (Blueprint $table) {
            $table->string('otp_code')->nullable()->after('is_active');
            $table->timestamp('otp_expires_at')->nullable()->after('otp_code');
            $table->timestamp('last_login_at')->nullable()->after('otp_expires_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('brand_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->string('role')->default('brand_manager')->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('brand_id');
            $table->dropColumn('role');
        });

        Schema::table('vip_clients', function (Blueprint $table) {
            $table->dropColumn(['otp_code', 'otp_expires_at', 'last_login_at']);
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn(['category', 'form_schema', 'color_config', 'subscription_status']);
        });
    }
};
