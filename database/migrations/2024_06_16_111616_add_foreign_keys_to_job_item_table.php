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
        Schema::table('job_item', function (Blueprint $table) {
            $table->foreign(['jobid'], 'job_item_ibfk_1')->references(['id'])->on('job')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['item'], 'job_item_ibfk_2')->references(['id'])->on('item')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_item', function (Blueprint $table) {
            $table->dropForeign('job_item_ibfk_1');
            $table->dropForeign('job_item_ibfk_2');
        });
    }
};
