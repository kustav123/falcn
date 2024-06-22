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
        Schema::create('appinfo', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->string('name', 50)->nullable();
            $table->string('logo', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('gstno', 17)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appinfo');
    }
};
