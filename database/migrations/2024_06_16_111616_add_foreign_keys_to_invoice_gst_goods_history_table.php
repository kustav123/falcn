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
        Schema::table('invoice_gst_goods_history', function (Blueprint $table) {
            $table->foreign(['entry_id'], 'invoice_gst_goods_history_ibfk_1')->references(['id'])->on('invoice_gst_goods_main')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['product'], 'invoice_gst_goods_history_ibfk_2')->references(['id'])->on('product_bill')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_gst_goods_history', function (Blueprint $table) {
            $table->dropForeign('invoice_gst_goods_history_ibfk_1');
            $table->dropForeign('invoice_gst_goods_history_ibfk_2');
        });
    }
};
