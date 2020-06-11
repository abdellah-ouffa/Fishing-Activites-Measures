<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fishes.index', [
            'fishes' => Fish::filter(request()->all())
                            ->paginate(Constant::COUNT_PER_PAGE)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fishes.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fish::create([
            'scientific_name' => $request->scientific_name, 
            'french_name' => $request->french_name, 
            'commercial_size' => $request->commercial_size,
            'measurement_standards' => $request->measurement_standards,
            'category_id' => $request->category_id,
            'image' => Helper::saveFileFromRequest($request, 'picture'), 
        ]);

        session()->flash('success', 'Saved');

        return redirect()->route('fishes.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fish = Fish::findOrFail($id);

        return view('admin.fishes.edit', [
            'categories' => Category::all(),
            'fish' => $fish
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fish = Fish::findOrFail($id);

        $fish->update([
            'scientific_name' => $request->scientific_name, 
            'french_name' => $request->french_name, 
            'commercial_size' => $request->commercial_size,
            'measurement_standards' => $request->measurement_standards,
            'image' => Helper::saveFileFromRequest($request, 'picture', $fish->picture) ?? $fish->image
        ]);

        session()->flash('success', 'Updated');

        return redirect()->route('fishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fish = Fish::findOrFail($id);
        $fish->delete();

        session()->flash('success', 'Updated');

        return redirect()->route('fishes.index');
    }
}
