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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->text('fname');
            $table->text('family');
            $table->text('father_name');
            $table->text('tarikhtavallod');
            $table->text('gender');
            $table->string('national_code');
            $table->text('mahalsodoor');
            $table->text('mobile');
            $table->text('email');
            $table->text('shartsenni');
            $table->text('vaziattaahol');
            $table->text('codeshahr');
            $table->text('telephone');

            $table->text('sh_shenasnameh');


            $table->text('meliat');
            $table->text('namekeshvar');
            $table->text('gozarname');
            $table->string('master',10);
            $table->text('mastercode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
