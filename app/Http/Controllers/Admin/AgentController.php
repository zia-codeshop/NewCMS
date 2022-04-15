<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.agents.index', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'agents' => Agent::where('role', '1')->orderBy('id', 'DESC')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.agents.create', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:agents,email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'image' => 'required|max:1024',
        ]);

        $agent = new Agent();
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->address = $request->address;
        $agent->role = '1';
        $agent->image = $request->image->store('agents/', 'public');

        $agent->save();

        return redirect()->route('admin.agents.index')->with('success', 'Agent added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {

        dd($agent);
        exit();
        return view('admin.pages.agents.edit', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'agent' => $agent
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:agents,email,'.$agent->id,
            'phone' => 'required|numeric',
            'address' => 'required',
            'image' => 'sometimes|max:1024',
        ]);

        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->address = $request->address;

        if ($request->image)
        {
            File::delete(public_path('storage/'.$agent->image));
            $agent->image = $request->image->store('agents/', 'public');
        }


        $agent->save();

        return redirect()->route('admin.agents.index')->with('success', 'Agent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        File::delete(public_path('storage/'.$agent->image));

        $agent->delete();
        return redirect()->route('admin.agents.index')->with('success', 'Agent deleted successfully');
    }
}
