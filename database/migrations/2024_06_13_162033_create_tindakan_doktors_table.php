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
        Schema::create('tindakan_doktors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actionable_id');
            $table->string('actionable_type');
            $table->string('action_application_date');
            $table->string('action_application_remark');
            $table->unsignedBigInteger('action_application_officer')->nullable();
            $table->foreign('action_application_officer')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindakan_doktors');
    }
};
