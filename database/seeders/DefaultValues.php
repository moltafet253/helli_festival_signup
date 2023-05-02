<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultValues extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        DB::table('research_types')->insert([
            ['title' => 'تحقیق و تألیف', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'ترجمه', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'تصحیح و تعلیق', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('research_formats')->insert([
            ['title' => 'پایان‌نامه', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'تحقیق پایانی', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'کتاب', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'مقاله', 'user' => '0371714941', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('festivals')->insert([
            ['id'=>15,'title' => 'پانزدهم', 'start_date' => '1402/02/10', 'starter' => '0371714941', 'finish_date' => '1402/05/10', 'finisher' => '0371714941', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
