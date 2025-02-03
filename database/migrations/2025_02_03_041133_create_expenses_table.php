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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->onDelete('cascade');
            $table->string('expenses')->nullable();
            $table->string('purpose')->nullable();
            $table->text('description')->nullable();
            $table->string('amount')->nullable();
            $table->date('expense_date')->nullable();
            $table->enum('expense_status', ['Active', 'Inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
