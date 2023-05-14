<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scientific_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('user')->default('0371714941');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('scientific_groups')->insert([
            ['title' => 'اخلاق و تربیت', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'ادبیات', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'اصول فقه', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'تاریخ اسلام', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'تفسیر و علوم قرآنی', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'علوم انسانی', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'علوم حدیث و درایه', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'فقه و حقوق اسلامی', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'فلسفه و منطق', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'کلام', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scientific_groups');
    }
};
