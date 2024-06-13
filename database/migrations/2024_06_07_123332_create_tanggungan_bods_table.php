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
        Schema::create('tanggungan_bods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bod_id')->nullable();
            $table->foreign('bod_id')->references('id')->on('profil_bods')->onDelete('cascade');
            $table->string('bod_dependents_name');
            $table->string('bod_dependents_ic');
            $table->string('bod_dependents_age');
            $table->string('bod_dependents_relations');
            $table->string('bod_dependents_remark');
            $table->string('bod_dependents_status')->comment('0-Tidak Aktif | 1-Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggungan_bods');
    }
};
