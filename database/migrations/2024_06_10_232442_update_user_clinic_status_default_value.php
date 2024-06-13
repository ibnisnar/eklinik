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
        Schema::table('user_kliniks', function (Blueprint $table) {
            $table->string('user_clinic_status')->default('1')->comment('0-Tidak Aktif | 1-Aktif')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_kliniks', function (Blueprint $table) {
            $table->string('user_clinic_status')->comment('0-Tidak Aktif | 1-Aktif')->change();
        });
    }
};
