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
        Schema::create('rawatans', function (Blueprint $table) {
            $table->id();
            $table->string('rawatan_name');
            $table->unsignedBigInteger('rawatan_fk_clinic')->nullable();
            $table->foreign('rawatan_fk_clinic')->references('id')->on('kliniks')->onDelete('set null');
            $table->string('rawatan_status')->default('1')->comment('0-Tidak Aktif | 1-Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawatans');
    }
};
