<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("classes")->insert(array(
            [
                "teacher_class" => "Wali Kelas 1",
                "class" => "A",
                "tag" => "VII"
            ],
            [
                "teacher_class" => "Wali Kelas 2",
                "class" => "B",
                "tag" => "VII"
            ],
            [
                "teacher_class" => "Wali Kelas 3",
                "class" => "C",
                "tag" => "VIII"
            ],
            [
                "teacher_class" => "Wali Kelas 4",
                "class" => "A",
                "tag" => "IX"
            ],
            [
                "teacher_class" => "Wali Kelas 5",
                "class" => "C",
                "tag" => "VIII"
            ],
            [
                "teacher_class" => "Wali Kelas 6",
                "class" => "A",
                "tag" => "IX"
            ]
        ));
    }
}
