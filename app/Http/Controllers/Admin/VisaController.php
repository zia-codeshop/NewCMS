<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteInformation;
use App\Models\User;
use App\Models\visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.visas.index', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'visas' => visa::orderBy('id', 'DESC')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.visas.create', [
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
            'company' => 'required',

        ]);

        $visa = new visa();
        $visa->name = $request->name;
        $visa->company = $request->company;



        $visa->save();

        return redirect()->route('admin.visas.index')->with('success', 'visa added successfully');
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
    public function edit(Visa $visa)
    {


        return view('admin.pages.visas.edit', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'visa' => $visa
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visa $visa)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);

        $visa->name = $request->name;
        $visa->email = $request->email;
        $visa->phone = $request->phone;
        $visa->address = $request->address;




        $visa->save();

        return redirect()->route('admin.visas.index')->with('success', 'Visa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visa $visa)
    {


        $visa->delete();
        return redirect()->route('admin.visas.index')->with('success', 'Visa deleted successfully');
    }
}
