<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Student;
use App\Models\ScholarYear;
use App\Models\Classe;
use App\Helpers\Constant;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

    	for ($i=0; $i < 500; $i++) { 
	        $user = User::create([
	            'first_name' => $faker->firstname,
	            'last_name' => $faker->lastname, 
	            'gender' => Constant::USERS_GENDERS[mt_rand(0, (count(Constant::USERS_GENDERS)) - 1)], 
	            'tel' => $faker->phoneNumber, 
	            'email' => $faker->unique()->safeEmail, 
	            'password' => bcrypt('123456789'),
	            'visible_password' => '123456789',
	            'is_active' =>  mt_rand(0, 1),
	            'role' => Constant::USER_ROLES['student']
	        ]);

	        $user->student()->save(
	            Student::create([
	                'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),  
	                'registration_number' => $faker->unique()->randomNumber(8), 
	                'address' => $faker->address
	            ])
	        );
	        

            $scholarYears = ScholarYear::all();

            foreach ($scholarYears as $scholarYear) {
		        if(mt_rand(0, 1)) {
	        		$user->student->classes()->attach(
	        			$scholarYear->classes()->select('id')->get()->random(1)[0]->id
	        		);        	
		        }
            }
    	}
    }
}
