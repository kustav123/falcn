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
        Schema::table('invoice_kancha_main', function (Blueprint $table) {
            $table->foreign(['created_by'], 'invoice_kancha_main_ibfk_1')->references(['id'])->on('appuser')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['to'], 'invoice_kancha_main_ibfk_2')->references(['id'])->on('client')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_kancha_main', function (Blueprint $table) {
            $table->dropForeign('invoice_kancha_main_ibfk_1');
            $table->dropForeign('invoice_kancha_main_ibfk_2');
        });
    }
};
