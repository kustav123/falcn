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
        Schema::create('item', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 30)->nullable();
            $table->string('accessary', 200)->nullable();
            $table->string('complain', 200)->nullable();
            $table->string('make', 200)->nullable();
            $table->string('remarks', 100)->nullable();
            $table->boolean('status')->nullable();
            $table->string('created_by', 10)->nullable()->index('created_by');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
