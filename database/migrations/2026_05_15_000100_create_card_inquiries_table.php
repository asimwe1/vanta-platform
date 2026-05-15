<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('card_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('design_type')->default('matte_black');
            $table->unsignedInteger('quantity')->default(20);
            $table->string('intent')->default('inquiry');
            $table->text('notes')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index('design_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_inquiries');
    }
};
