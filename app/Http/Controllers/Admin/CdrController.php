<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cdr;
use App\Models\People;
use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Http\Request;

class CdrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.pages.cdrs.index', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'cdrs' => Cdr::where('status', '=', 'pending')->orderBy('id', 'DESC')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.cdrs.create', [
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
//        dd($request->all());
//        exit();
        $request->validate([
            'account_holder' => 'required',
            'amount' => 'required',
            'cdr_no' => 'required',
            'project' => 'required',


        ]);

        $cdr = new Cdr();
        $cdr->account_holder = $request->account_holder;
        $cdr->amount = $request->amount;
        $cdr->cdr_no = $request->cdr_no;
        $cdr->project = $request->project;

        $cdr->save();

        return redirect()->route('admin.cdrs.index')->with('success', 'Cdr added successfully');
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
    public function edit($id)
    {

        $cdr = Cdr::findorfail($id);

        return view('admin.pages.cdrs.edit', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'cdr' => $cdr
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cdr $cdr)
    {
        $request->validate([
            'account_holder' => 'required',
            'amount' => 'required',
            'cdr_no' => 'required',
            'project' => 'required',


        ]);

        $cdr->account_holder = $request->account_holder;
        $cdr->amount = $request->amount;
        $cdr->cdr_no = $request->cdr_no;
        $cdr->project = $request->project;


        $cdr->save();

        return redirect()->route('admin.cdrs.index')->with('success', 'Cdr updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cdr $cdr)
    {

        $cdr->delete();
        return redirect()->route('admin.cdrs.index')->with('success', 'Cdr deleted successfully');
    }
}
