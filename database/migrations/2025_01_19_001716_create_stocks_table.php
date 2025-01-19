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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                  ->nullable()
                  ->constrained('products')
                  ->onDelete('cascade');
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->string('quantity')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('buying_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('quantity_alert')->nullable();
            $table->enum('discount_type', ['Percentage', 'Cash']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
