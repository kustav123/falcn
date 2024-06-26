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
            $table->dropForeign('job_item_ibfk_2');

            // Drop the columns
            $table->dropColumn(['rest']); // Replace with actual column names

            // // Modify the 'item' column
            $table->string('item', 30)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_item', function (Blueprint $table) {
            //
        });
    }
};
