<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('users') || ! Schema::hasColumn('users', 'role') || ! Schema::hasColumn('users', 'brand_id')) {
            return;
        }

        DB::table('users')
            ->whereNull('brand_id')
            ->update(['role' => 'super_admin']);

        DB::table('users')
            ->whereNotNull('brand_id')
            ->where('role', 'super_admin')
            ->update(['role' => 'brand_manager']);
    }

    public function down(): void
    {
        //
    }
};
