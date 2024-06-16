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
        Schema::create('leadger_sc', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('clid', 50)->nullable()->index('clid');
            $table->date('date')->nullable();
            $table->string('type', 20)->nullable();
            $table->float('current_amomount')->nullable();
            $table->float('truns_ammount')->nullable();
            $table->string('mode', 10)->nullable();
            $table->string('remarks', 50)->nullable();
            $table->string('refno', 50)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leadger_sc');
    }
};
