<?php

use Illuminate\Database\Seeder;
use App\Helpers\Constant;
use App\Models\Level;
use App\Models\SubLevel;

class LevelSubLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    	
    	foreach (Constant::DEFAULT_LEVELS_SUBLEVELS as $levelTitle => $subLevels) {
	    	$level = Level::create([
		        'title' => $levelTitle, 
	    	]);

	    	foreach ($subLevels as $subLevelTitle) {
	    		SubLevel::create([
			        'title' => $subLevelTitle,
			        'level_id' => $level->id
		    	]);
	    	}
    	}
    }
}
