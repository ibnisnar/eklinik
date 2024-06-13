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
        Schema::create('keterangan_perubahans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_application')->nullable();
            $table->foreign('fk_application')->references('id')->on('permohonan_perubahans')->onDelete('cascade');
            $table->string('application_type')->comment('1-Caj Rundingan | 2-Rawatan | 3-Ubatan | 4-Ujian Makmal');
            $table->string('application_item');
            $table->decimal('application_amaun', 10, 2)->nullable();
            $table->string('application_status')->default('1')->comment('0-Tidak Aktif | 1-Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keterangan_perubahans');
    }
};
