<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();

        return response()->json([
        	'categories' => CategoryResource::collection($categories)
        ], 200);
    }
}
