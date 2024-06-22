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
        Schema::table('leadger_sc', function (Blueprint $table) {
            $table->foreign(['clid'], 'leadger_sc_ibfk_1')->references(['id'])->on('client')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leadger_sc', function (Blueprint $table) {
            $table->dropForeign('leadger_sc_ibfk_1');
        });
    }
};
