<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('card_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('quantity');
            $table->string('design_type')->default('matte_black');
            $table->string('status')->default('pending');
            $table->unsignedInteger('unit_price')->nullable();
            $table->unsignedInteger('quoted_total')->nullable();
            $table->string('custom_artwork_path')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('fulfilled_at')->nullable();
            $table->timestamps();

            $table->index(['brand_id', 'status']);
            $table->index('design_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_orders');
    }
};
