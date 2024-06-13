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
        Schema::create('user_kliniks', function (Blueprint $table) {
            $table->id();
            $table->string('user_clinic_name');
            $table->string('user_clinic_type')->comment('1-Individu | 2-Syarikat');
            $table->string('user_clinic_reference_id');
            $table->string('user_clinic_email');
            $table->unsignedBigInteger('user_clinic_fk_clinic')->nullable();
            $table->foreign('user_clinic_fk_clinic')->references('id')->on('kliniks')->onDelete('set null');
            $table->string('user_clinic_roles')->comment('1-Super Admin | 2-HQ klinik | 3-Pembantu klinik | 4-Penyemak HR | 5-Penyokong HR | 6-Pelulus HR | 7-Admin JU');
            $table->string('user_clinic_status')->comment('0-Tidak Aktif | 1-Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_kliniks');
    }
};
