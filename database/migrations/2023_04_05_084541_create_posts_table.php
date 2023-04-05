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
            $table->string('jashnvareh');
            $table->integer('codeasar');
            $table->text('nameasar');
            $table->text('noefaaliat');
            $table->text('ghalebpazhouhesh');
            $table->integer('satharzyabi');
            $table->text('groupelmi');
            $table->text('bakhshvizheh');
            $table->text('subject_bakhshvizheh');
            $table->text('noepazhouhesh');
            $table->text('vaziatnashr');
            $table->text('tedadsafhe');
            $table->text('tedadsafahat250kalame');
            $table->text('file_pdf');
            $table->text('file_word');
            $table->timestamps();
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
