<?php

use Illuminate\Database\Seeder;
use App\Models\ScholarYear;
use App\Models\SubLevel;
use App\Models\Classe;
use Faker\Factory;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();

        $scholarYears = ScholarYear::all();
        $subLevels = SubLevel::all();

        foreach ($scholarYears as $key => $scholarYear) {
	        foreach ($subLevels as $subLevel) {
		        for ($i=0; $i < mt_rand(0, 5); $i++) { 
			        Classe::create([
			            'title' => 'Classe ' . ($i+1),
			            'sub_level_id' => $subLevel->id,
			            'scholar_year_id' => $scholarYear->id,
			        ]);
		        }
	        }
        }

    }
}
