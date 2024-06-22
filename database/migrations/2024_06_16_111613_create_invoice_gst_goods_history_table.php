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
        Schema::create('invoice_gst_goods_history', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('entry_id')->index('entry_id');
            $table->timestamp('created_at')->useCurrent();
            $table->string('product')->nullable()->index('product');
            $table->float('qty')->nullable();
            $table->string('HSN', 8)->nullable();
            $table->string('cgst', 10)->nullable();
            $table->string('sgst', 10)->nullable();
            $table->float('gross_amount')->nullable();
            $table->float('total_ammount')->nullable();
            $table->string('remarks', 100)->nullable();

            $table->primary(['id', 'entry_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_gst_goods_history');
    }
};
