<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(ScholarYearSeeder::class);
        $this->call(LevelSubLevelsSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
