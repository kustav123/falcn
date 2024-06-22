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
        Schema::create('raw_product', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('name', 50);
            $table->timestamp('created_at')->nullable();
            $table->string('unit', 20);
            $table->string('created_by', 10);
            $table->string('current_stock') ->nullable();
            $table->string('status', 1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_product');

    }
};
