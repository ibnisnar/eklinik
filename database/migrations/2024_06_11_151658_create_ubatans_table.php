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
        Schema::create('ubatans', function (Blueprint $table) {
            $table->id();
            $table->string('ubatan_name');
            $table->string('ubatan_amaun');
            $table->unsignedBigInteger('ubatan_fk_clinic')->nullable();
            $table->foreign('ubatan_fk_clinic')->references('id')->on('kliniks')->onDelete('set null');
            $table->string('ubatan_status')->default('1')->comment('0-Tidak Aktif | 1-Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubatans');
    }
};
