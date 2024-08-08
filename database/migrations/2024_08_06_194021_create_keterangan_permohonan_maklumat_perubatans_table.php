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
        Schema::create('keterangan_permohonan_maklumat_perubatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_permohonan')->nullable();
            $table->foreign('fk_permohonan')->references('id')->on('permohonan_maklumat_perubatans')->onDelete('cascade');
            $table->string('permohonan_perubatan')->comment('1-Caj Rundingan | 2-Rawatan | 3-Ubatan | 4-Ujian Makmal');
            $table->string('permohonan_item');
            $table->decimal('permohonan_amaun', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keterangan_permohonan_maklumat_perubatans');
    }
};
