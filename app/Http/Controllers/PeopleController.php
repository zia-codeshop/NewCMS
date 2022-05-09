<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.people.index', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'peoples' => People::orderBy('id', 'DESC')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.people.create', [
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
            'contact' => 'required',

        ]);

        $people = new People();
        $people->name = $request->name;
        $people->contact = $request->contact;
        $people->address = $request->address;

        $people->save();

        return redirect()->route('admin.peoples.index')->with('success', 'People added successfully');
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
    public function edit(People $people)
    {


        return view('admin.pages.people.edit', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'people' => $people
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
        ]);

        $people->name = $request->name;
        $people->contact = $request->contact;
        $people->address = $request->address;


        $people->save();

        return redirect()->route('admin.peoples.index')->with('success', 'People updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {

        $people->delete();
        return redirect()->route('admin.peoples.index')->with('success', 'People deleted successfully');
    }
}
