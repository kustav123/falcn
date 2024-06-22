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
        Schema::create('job', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('clid', 20)->nullable()->index('clid');
            $table->string('status', 10)->nullable();
            $table->float('echarge')->nullable();
            $table->string('assigned', 10)->nullable()->index('assigned');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};
