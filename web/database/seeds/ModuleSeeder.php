<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Module;
use App\Models\Classe;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();

    	$classes = Classe::all();

        foreach ($classes as $classe) {
        	$length = mt_rand(3, 5);
        	for ($i=0; $i < $length; $i++) { 
	    		Module::create([
			        'title' => $faker->sentence(2),
			        'color' => $faker->hexcolor,
			        'classe_id' => $classe->id
		    	]);
        	}
    	}
    }
}
