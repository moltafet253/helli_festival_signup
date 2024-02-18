<?php

use App\Models\Helli\ResearchFormat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('research_formats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('user');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        ResearchFormat::insert([
            ['title' => 'پایان‌نامه', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'تحقیق پایانی', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'کتاب', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'مقاله', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_formats');
    }
};
