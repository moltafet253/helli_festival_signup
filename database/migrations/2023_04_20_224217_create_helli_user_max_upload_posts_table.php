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
        Schema::create('helli_user_max_upload_posts', function (Blueprint $table) {
            $table->id();
            $table->string('national_code');
            $table->integer('numbers')->default(3);
            $table->boolean('sent_status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helli_user_max_upload_posts');
    }
};
