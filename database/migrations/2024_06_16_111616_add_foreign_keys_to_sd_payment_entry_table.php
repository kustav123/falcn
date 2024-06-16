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
        Schema::table('sd_payment_entry', function (Blueprint $table) {
            $table->foreign(['created_by'], 'sd_payment_entry_ibfk_1')->references(['id'])->on('appuser')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sd_payment_entry', function (Blueprint $table) {
            $table->dropForeign('sd_payment_entry_ibfk_1');
        });
    }
};
