<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Infraction;
use Illuminate\Http\Request;

class InfractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.infractions.index', [
            'infractions' => Infraction::paginate(Constant::COUNT_PER_PAGE)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infractions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Infraction::create($request->all());

        session()->flash('success', 'Saved');

        return redirect()->route('infractions.create');
    }

    public function show($id)
    {
        $infraction = Infraction::findOrFail($id);

        return view('admin.infractions.show', [
            'infraction' => $infraction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infraction = Infraction::findOrFail($id);

        return view('admin.infractions.edit', [
            'infraction' => $infraction
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
        $infraction = Infraction::findOrFail($id);

        $infraction->update($request->all());

        session()->flash('success', 'Updated');

        return redirect()->route('infractions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infraction = Infraction::findOrFail($id);
        $infraction->delete();

        session()->flash('success', 'Updated');

        return redirect()->route('infractions.index');
    }
}
