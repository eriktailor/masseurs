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
        Schema::create('masseur_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('masseur_id');
            $table->string('mother_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('visa_number')->nullable();
            $table->date('visa_expire')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_expire')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('masseur_id')->references('id')->on('masseurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masseur_details');
    }
};
