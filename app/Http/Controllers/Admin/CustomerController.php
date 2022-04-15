<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.customers.index', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'agents' => Agent::where('role', '0')->orderBy('id', 'DESC')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.customers.create', [
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
        $agent->passport = $request->passport;
        $agent->cnic = $request->cnic;
        $agent->dob = $request->dob;
        $agent->image = $request->image->store('agents/', 'public');

        $agent->save();

        return redirect()->route('admin.customers.create');
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
//        dd(Agent::where('id',$id)->get());
//        exit();
        return view('admin.pages.customers.edit', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'agent' => $agent,
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
        $agent->passport = $request->passport;
        $agent->cnic = $request->cnic;
        $agent->dob = $request->dob;

        if ($request->image)
        {
            File::delete(public_path('storage/'.$agent->image));
            $agent->image = $request->image->store('agents/', 'public');
        }


        $agent->save();
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully');
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
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }
}
