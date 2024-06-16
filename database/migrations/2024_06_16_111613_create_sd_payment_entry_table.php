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
        Schema::create('sd_payment_entry', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('clid', 20)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->float('amount')->nullable();
            $table->string('mode', 10)->nullable();
            $table->float('hisamount')->nullable();
            $table->float('curamount')->nullable();
            $table->string('remarks', 100)->nullable();
            $table->string('created_by', 10)->nullable()->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sd_payment_entry');
    }
};
