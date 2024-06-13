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
        Schema::create('permohonan_perubahans', function (Blueprint $table) {
            $table->id();
            $table->string('application_date')->nullable();
            $table->string('application_no')->unique();
            $table->unsignedBigInteger('application_fk_clinic')->nullable();
            $table->foreign('application_fk_clinic')->references('id')->on('kliniks')->onDelete('set null');
            $table->unsignedBigInteger('application_fk_user')->nullable();
            $table->foreign('application_fk_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('application_status')->default('1')->comment('0-Draft | 1-Permohonan Baru | 2-Disokong Agensi | 3-Tidak Disokong Agensi | 4-Dikuiri Agensi | 5-Disokong Doktor PPJ | 6-Tidak Disokong Doktor PPJ | 7-Dikuiri Doktor PPJ | 8-Diluluskan | 9-Tidak Diluluskan | 10-Dikuiri Pelulus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_perubahans');
    }
};
