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
        Schema::table('Kategori', function (Blueprint $table) {
            $table->string('startFrom');
            $table->string('sizeChart');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Kategori', function (Blueprint $table) {
            $table->dropColumn('startFrom');
            $table->dropColumn('sizeChart');
        });
    }
};
