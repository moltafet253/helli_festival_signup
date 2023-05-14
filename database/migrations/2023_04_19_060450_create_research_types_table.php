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
        Schema::create('research_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('user');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('research_types')->insert([
            ['title' => 'تحقیق و تألیف', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'ترجمه', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'تصحیح و تعلیق', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_types');
    }
};
