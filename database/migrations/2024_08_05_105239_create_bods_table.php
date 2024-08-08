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
        Schema::create('bods', function (Blueprint $table) {
            $table->id();
            $table->string('no_pekerja');
            $table->string('name');
            $table->string('no_pengenalan');
            $table->string('no_telefon');
            $table->string('email');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bods');
    }
};
