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
        Schema::create('educational_infos', function (Blueprint $table) {
            $table->id();
            $table->string('national_code')->unique();
            $table->text('namemarkaztahsili')->nullable();
            $table->text('noetahsilhozavi')->nullable();
            $table->text('paye')->nullable();
            $table->text('sath')->nullable();
            $table->text('term')->nullable();
            $table->text('ostantahsili')->nullable();
            $table->text('shahrtahsili')->nullable();
            $table->text('madresetahsili')->nullable();
            $table->text('shparvandetahsili')->nullable();
            $table->text('tahsilatghhozavi')->nullable();
            $table->text('reshtedaneshgahi')->nullable();
            $table->text('markaztakhasosihozavi')->nullable();
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
        Schema::dropIfExists('educational_infos');
    }
};
