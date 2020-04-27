<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\Zone;

class FishController extends Controller
{
    public function measures($id)
    {
    	$fish = Fish::findOrFail($id);

    	$resource = Zone::select('id', 'location')
    		->with(['measureAttribute' => function ($query) {
    			$query->select('name', 'value');
    		}])
    		->whereHas('measureAttribute', function ($query) use ($fish) {
			    $query->where('measure_id', $fish->measure_id);
			})
			->get()
			->toArray();

		return response()->json($resource, 200);
    }

}
