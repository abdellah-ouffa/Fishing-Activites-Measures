<?php 

use Carbon\Carbon;

return [
	
	/*
    * Current Scholar Year
    */
    'current_scholar_year' => Carbon::now()->year . '-' . (Carbon::now()->year + 1),
    'current_scholar_year_id' => null,
];