<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\Measure;
use App\Models\MeasureAttribute;
use App\Models\Zone;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measures =  Measure::all();

        return view('admin.measures.index', [
            'measures' => $measures
        ]);
    }

    public function create()
    {
        $fishes =  Fish::all();

        return view('admin.measures.create', [
            'fishes' => $fishes,
            'zones' => Zone::all(['id', 'location'])
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
        $measure = Measure::create([
            'name' => $request->get('measure_name')
        ]);

        foreach ($request->get('value') as $key => $value) {
            $attributeName = Constant::DEFAULT_MEASURE_ATTRIBUTES[$key];
            if(isset($request->get('zones')[$key])) {
                $zones = array_values($request->get('zones')[$key]);
                foreach ($value as $k => $singleValue) {
                    $attribute = MeasureAttribute::create([
                        'name' => $attributeName,
                        'value' => $singleValue,
                        'measure_id' => $measure->id,
                    ]);
                    foreach ($zones[$k] as $subKey => $zone) {
                        $attribute->zones()->attach($zone);
                    }
                }
            }
        }

        Fish::whereIn('id', array_values($request->get('fishes')))
            ->update(['measure_id' => $measure->id]);

        session()->flash('success', 'Saved');

        return redirect()->route('measures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $measure = Measure::findOrFail($id);
        $measure->delete();

        session()->flash('success', 'Updated');

        return redirect()->route('measures.index');
    }
}
