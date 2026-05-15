<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table): void {
            if (! Schema::hasColumn('brands', 'logo_path')) {
                $table->string('logo_path')->nullable();
            }

            if (! Schema::hasColumn('brands', 'primary_color')) {
                $table->string('primary_color')->nullable();
            }

            if (! Schema::hasColumn('brands', 'accent_color')) {
                $table->string('accent_color')->nullable();
            }

            if (! Schema::hasColumn('brands', 'whatsapp_number')) {
                $table->string('whatsapp_number')->nullable();
            }

            if (! Schema::hasColumn('brands', 'email')) {
                $table->string('email')->nullable();
            }

            if (! Schema::hasColumn('brands', 'website')) {
                $table->string('website')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table): void {
            foreach (['logo_path', 'primary_color', 'accent_color', 'whatsapp_number', 'email', 'website'] as $column) {
                if (Schema::hasColumn('brands', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
