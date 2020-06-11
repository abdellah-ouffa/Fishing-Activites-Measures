<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Models\User;
use App\Models\Agent;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agents.index', [
            'agents' => Agent::filter(request()->all())
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
        return view('admin.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name, 
            'is_active' => true,
            'role' => Constant::USER_ROLES['agent'],
            'ppr_number' => $request->ppr_number,
        ]);

        Agent::create([
            'user_id' => $user->id
        ]);

        session()->flash('success', 'Saved');

        return redirect()->route('agents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.agents.show', [
            'agent' => Agent::findOrFail($id)
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
        return view('admin.agents.edit', [
            'agent' => Agent::findOrFail($id)
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
        $agent = Agent::findOrFail($id);

        $agent->user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name, 
            'password' => $request->password ? bcrypt($request->password) : $agent->user->password, 
            'visible_password' => $request->password ? $request->password : $agent->user->visible_password, 
            'ppr_number' => $request->ppr_number, 
            'is_active' => $request->is_active ? true : false, 
        ]);

        session()->flash('success', 'Updated');

        return redirect()->route('agents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->user->delete();

        session()->flash('success', 'Updated');

        return redirect()->route('agents.index');
    }
}
