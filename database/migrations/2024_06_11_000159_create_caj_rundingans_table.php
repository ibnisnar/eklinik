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
        Schema::create('caj_rundingans', function (Blueprint $table) {
            $table->id();
            $table->string('caj_rundingan_name');
            $table->string('caj_rundingan_amaun');
            $table->unsignedBigInteger('caj_rundingan_fk_clinic')->nullable();
            $table->foreign('caj_rundingan_fk_clinic')->references('id')->on('kliniks')->onDelete('set null');
            $table->string('caj_rundingan_status')->default('1')->comment('0-Tidak Aktif | 1-Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caj_rundingans');
    }
};
