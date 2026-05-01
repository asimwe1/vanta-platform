<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vip_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('slug')->unique();
            $table->string('membership_code')->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('notes')->nullable();
            $table->json('profile_data')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('shared_at')->nullable();
            $table->timestamps();

            $table->index('brand_id');
            $table->index('slug');
            $table->index('membership_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vip_clients');
    }
};
