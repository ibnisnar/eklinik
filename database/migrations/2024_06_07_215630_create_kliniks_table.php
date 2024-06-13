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
        Schema::create('kliniks', function (Blueprint $table) {
            $table->id();
            $table->string('clinic_name');
            $table->string('clinic_branch');
            $table->string('clinic_address');
            $table->string('clinic_ssm');
            $table->string('clinic_type')->comment('1-HQ | 2-Cawangan');
            $table->string('clinic_prefix');
            $table->string('clinic_status')->default('1')->comment('0-Tidak Aktif | 1-Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kliniks');
    }
};
