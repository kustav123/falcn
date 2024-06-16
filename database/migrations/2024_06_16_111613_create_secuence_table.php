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
        Schema::create('secuence', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('type', 20)->nullable();
            $table->string('head', 20)->nullable();
            $table->string('sno', 20)->nullable();
            $table->string('remarks', 40)->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secuence');
    }
};
