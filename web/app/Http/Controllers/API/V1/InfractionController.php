<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Infraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\InfractionResource;

class InfractionController extends Controller
{
    public function index()
    {
    	$infractions = Infraction::all();

        return response()->json([
        	'infractions' => InfractionResource::collection($infractions)
        ], 200);
    }
}