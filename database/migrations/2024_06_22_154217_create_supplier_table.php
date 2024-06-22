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
        Schema::create('supplier', function (Blueprint $table) {
                $table->string('id', 20)->primary();
                $table->string('merchant_name', 30);
                $table->string('mobile', 15);
                $table->string('email', 50);
                $table->string('address', 40);
                $table->timestamp('created_at')->useCurrent();
                $table->string('created_by', 10);
                $table->integer('status');
                $table->float('due_ammount');
                $table->string('gst', 17);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
