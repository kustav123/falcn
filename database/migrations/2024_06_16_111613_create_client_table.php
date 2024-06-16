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
        Schema::create('client', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('name', 30)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('address', 40)->nullable();
            $table->integer('status')->nullable();
            $table->float('due_ammount')->nullable();
            $table->string('gst', 17)->nullable();
            $table->string('job', 100)->nullable();
            $table->string('remarks', 100)->nullable();
            $table->string('created_by', 10)->nullable()->index('created_by');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};
