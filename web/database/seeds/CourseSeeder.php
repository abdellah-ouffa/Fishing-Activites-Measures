<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Module;
use App\Models\Teacher;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();

    	$modules = Module::all();

    	$video = '<iframe width="560" height="315" src="https://www.youtube.com/embed/qZSJvyBag8A?rel=0&modestbranding=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        foreach ($modules as $module) {
        	$length = mt_rand(3, 5);
        	for ($i=0; $i < $length; $i++) { 
	        	Course::create([
		            'title' => $faker->sentence(3), 
		            'duration' => mt_rand(30, 60), 
		            'module_id' => $module->id, 
		            'teacher_id' => Teacher::select('id')->get()->random(1)[0]->id, 
		            'published_at' => $faker->dateTimeBetween('-1 years', 'now'), 
		            'video_content' => $video
		        ]);
        	}

    	}
    }
}
