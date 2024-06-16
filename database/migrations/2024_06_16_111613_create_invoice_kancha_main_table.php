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
        Schema::create('invoice_kancha_main', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('invoice_no', 30)->nullable();
            $table->string('refjob', 20)->nullable();
            $table->string('to', 20)->nullable()->index('to');
            $table->date('inovice_date')->nullable();
            $table->float('gross_amount')->nullable();
            $table->float('total_amount')->nullable();
            $table->string('remarks', 100)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by', 10)->nullable()->index('created_by');
            $table->boolean('paid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_kancha_main');
    }
};
