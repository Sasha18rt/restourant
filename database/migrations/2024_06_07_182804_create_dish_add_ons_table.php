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
        Schema::create('dish_add_ons', function (Blueprint $table) {
            $table->foreignId('dish_id')->constrained('dishes')->onDelete('cascade');
            $table->foreignId('addon_id')->constrained('add_ons')->onDelete('cascade');
            $table->primary(['dish_id', 'addon_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_add_ons');
    }
};
