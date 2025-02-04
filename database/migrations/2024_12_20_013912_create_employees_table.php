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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')
                  ->unique()
                  ->nullable()
                  ->constrained('accounts')
                  ->onDelete('cascade');
            $table->string('emp_id')->nullable();
            $table->string('position')->nullable();
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('leave')->nullable();
            $table->date('hired_date')->nullable();
            $table->date('resign_date')->nullable();
            $table->boolean('isActive')->nullable()->default(true);
            $table->enum('status', ['Employed', 'Resign'])->default('Employed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
