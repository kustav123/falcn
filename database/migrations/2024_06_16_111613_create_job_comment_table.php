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
        Schema::create('job_comment', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('jbid', 20)->nullable()->index('jbid');
            $table->string('usid', 10)->nullable()->index('usid');
            $table->string('type', 20)->nullable();
            $table->string('message', 30)->nullable();
            $table->timestamp('time')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_comment');
    }
};
