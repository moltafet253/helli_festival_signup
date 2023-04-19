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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('festival_id');
            $table->foreign('festival_id')->references('id')->on('festivals');
            $table->text('title');
            $table->unsignedBigInteger('research_format');
            $table->foreign('research_format')->references('id')->on('research_formats');
            $table->unsignedBigInteger('scientific_group');
            $table->foreign('scientific_group')->references('id')->on('scientific_groups');
            $table->unsignedBigInteger('research_type');
            $table->foreign('research_type')->references('id')->on('research_types');
            $table->string('pages_number')->nullable();
            $table->string('publish_status')->default('منتشر نشده');
            $table->string('special_section')->nullable();
            $table->string('activity_type')->default('فردی');
            $table->text('file_src');
            $table->boolean('sent')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
