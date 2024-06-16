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
        Schema::create('product_bill', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('name', 30)->nullable();
            $table->string('HSN', 8)->nullable();
            $table->string('cgst', 10)->nullable();
            $table->string('sgst', 10)->nullable();
            $table->string('remarks', 100)->nullable();
            $table->boolean('status')->nullable();
            $table->string('created_by', 10)->nullable()->index('created_by');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_bill');
    }
};
