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
        Schema::table('contagens', function (Blueprint $table) {
            $table->string('pais', 200)->after('ip')->nullable();
            $table->string('cidade', 200)->after('pais')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contagens', function (Blueprint $table) {
            //
        });
    }
};
