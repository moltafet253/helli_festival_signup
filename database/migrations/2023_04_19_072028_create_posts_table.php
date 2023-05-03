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
            $table->string('festival_title');
//            $table->foreign('festival_id')->references('id')->on('festivals');
            $table->text('title');
            $table->string('research_format');
//            $table->foreign('research_format')->references('id')->on('research_formats');
            $table->string('scientific_group');
//            $table->foreign('scientific_group')->references('id')->on('scientific_groups');
            $table->string('research_type');
//            $table->foreign('research_type')->references('id')->on('research_types');
            $table->string('pages_number')->nullable();
            $table->string('publish_status')->default('منتشر نشده');
            $table->string('special_section')->nullable();
            $table->string('activity_type')->default('فردی');
            $table->integer('participation_percentage')->default(100);
            $table->text('file_src');
            $table->boolean('sent')->default(0);
            $table->timestamp('sent_at')->nullable();
            $table->integer('assigned_post_id')->nullable();
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
