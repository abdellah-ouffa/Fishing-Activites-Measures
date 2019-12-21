<?php 

namespace App\Services;

use App\Models\ScholarYear;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Level;
use App\Helpers\Constant;

/**
 * StatisticService
 */
class StatisticService
{
	public function getCurrentScholarYear()
	{
		return ScholarYear::find(config('scholaryear.current_scholar_year_id'));
	}

	public function getCountStudentsInCurrentYear()
	{    	
    	return $this->getCurrentScholarYear()->classes->sum(function ($classe) {
    		return $classe->students()->count();
    	});
	}

	public function getCountClassesInCurrentYear()
	{    	
    	return $this->getCurrentScholarYear()->classes()->count();
	}

	public function getCountTeachers()
	{
    	return Teacher::count();
	}

	public function getCountLevelsInCurrentYear()
	{
    	return Level::count();
	}

	public function getCountAdmins()
	{
	    return User::where('role', Constant::USER_ROLES['admin'])->count();
	}
}