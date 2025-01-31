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
            $table->foreignId('supplier_id')
                    ->nullable()
                    ->constrained('entities')
                    ->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->decimal('selling_price', 10, 2)->nullable();
            $table->decimal('buying_price', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->integer('quantity_alert')->nullable();
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
