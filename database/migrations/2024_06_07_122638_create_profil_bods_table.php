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
        Schema::create('profil_bods', function (Blueprint $table) {
            $table->id();
            $table->string('bod_dependents_name');
            $table->string('bod_staff_id');
            $table->string('bod_ic');
            $table->string('bod_phone');
            $table->string('bod_email');
            $table->string('bod_address');
            $table->string('bod_remark');
            $table->string('bod_status')->comment('0-Tidak Aktif | 1-Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_bods');
    }
};
