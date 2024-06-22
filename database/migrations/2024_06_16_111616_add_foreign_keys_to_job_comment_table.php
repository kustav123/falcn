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
        Schema::table('job_comment', function (Blueprint $table) {
            $table->foreign(['usid'], 'job_comment_ibfk_1')->references(['id'])->on('appuser')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['jbid'], 'job_comment_ibfk_2')->references(['id'])->on('job')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_comment', function (Blueprint $table) {
            $table->dropForeign('job_comment_ibfk_1');
            $table->dropForeign('job_comment_ibfk_2');
        });
    }
};
