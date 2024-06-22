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
        Schema::create('job_item', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('jobid', 20)->nullable()->index('jobid');
            $table->integer('item')->nullable()->index('item');
            $table->string('make', 20)->nullable();
            $table->string('model', 30)->nullable();
            $table->string('snno', 30)->nullable();
            $table->string('proprty', 100)->nullable();
            $table->string('accessary', 200)->nullable();
            $table->string('complain', 200)->nullable();
            $table->float('rest')->nullable();
            $table->string('remarks', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_item');
    }
};
