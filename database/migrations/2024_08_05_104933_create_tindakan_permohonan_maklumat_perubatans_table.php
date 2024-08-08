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
        Schema::create('tindakan_permohonan_maklumat_perubatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_permohonan');
            $table->foreign('fk_permohonan')->references('id')->on('permohonan_maklumat_perubatans')->onDelete('cascade');
            $table->string('tindakan_type');
            $table->string('tindakan_date');
            $table->string('tindakan_jawatan')->nullable();
            $table->string('tindakan_agensi')->nullable();
            $table->string('tindakan_bahagian')->nullable();
            $table->string('tindakan_jabatan')->nullable();
            $table->string('tindakan_status')->comment('2-Disokong Agensi | 3-Tidak Disokong Agensi | 4-DiKuiri Agensi');
            $table->unsignedBigInteger('fk_user')->nullable();
            $table->foreign('fk_user')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindakan_permohonan_maklumat_perubatans');
    }
};
