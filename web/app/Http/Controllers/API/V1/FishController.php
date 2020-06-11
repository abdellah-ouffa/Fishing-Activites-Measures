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
        $measureId = $fish->measure_id;

    	$resource = Zone::select('id', 'location')
    		->with(['measureAttribute' => function ($query) use ($measureId) {
    			$query->select('name', 'value')->where('measure_id', $measureId);
    		}])
    		->whereHas('measureAttribute', function ($query) use ($measureId) {
			    $query->where('measure_id', $measureId);
			})
			->get()
			->toArray();

		return response()->json($resource, 200);
    }

}
