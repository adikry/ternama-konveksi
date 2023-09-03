<?php

use App\Models\User;
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
        Schema::table('slider', function (Blueprint $table) {
            $table->string('thumbnail')->change();
            $table->foreignIdFor(User::class, 'user_id');
            $table->string('sort')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slider', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('sort');
        });
    }
};
