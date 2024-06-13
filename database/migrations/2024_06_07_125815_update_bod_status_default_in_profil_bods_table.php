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
        Schema::table('profil_bods', function (Blueprint $table) {
            $table->string('bod_status')->default('1')->comment('0-Tidak Aktif | 1-Aktif')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_bods', function (Blueprint $table) {
            $table->string('bod_status')->default(null)->comment('0-Tidak Aktif | 1-Aktif')->change();
        });
    }
};
