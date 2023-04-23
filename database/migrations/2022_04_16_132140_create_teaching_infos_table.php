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
        Schema::create('teaching_infos', function (Blueprint $table) {
            $table->id();
            $table->string('national_code')->unique();
            $table->string('isMaster')->default('خیر');
            $table->string('masterCode')->nullable();
            $table->string('teachingProvince')->nullable();
            $table->string('teachingCity')->nullable();
            $table->string('teachingPlaceName')->nullable();
            $table->boolean('approved')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_infos');
    }
};
