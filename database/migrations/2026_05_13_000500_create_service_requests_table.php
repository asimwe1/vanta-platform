<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vip_client_id')->constrained()->cascadeOnDelete();
            $table->string('type')->default('inquiry');
            $table->json('data_payload');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->index(['brand_id', 'status']);
            $table->index(['vip_client_id', 'created_at']);
            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
