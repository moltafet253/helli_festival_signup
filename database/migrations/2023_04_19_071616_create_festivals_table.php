<?php

use App\Models\Helli\Festival;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('start_date');
            $table->string('starter');
            $table->string('finish_date');
            $table->string('finisher');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        Festival::insert([
            ['id' => 15, 'title' => 'پانزدهم', 'start_date' => '1402/02/10', 'starter' => '0371714941', 'finish_date' => '1402/05/10', 'finisher' => '0371714941', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festivals');
    }
};
