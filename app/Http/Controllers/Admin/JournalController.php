<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Journal;
use App\Models\People;
use App\Models\Project;
use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.journals.index', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'journals' => Journal::orderBy('id', 'DESC')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $journal =
//            Journal::select('journals.*','pr.',)
//                ->join('projects as pr','pr.id', '=', 'journals.project_id')
//                ->join('peoples as pp', 'pp.id', '=', 'journals.people_id')
//               ->get();
//        $journal =
//        DB::table('articles')
//            ->join('categories','articles.id', '=', 'categories.id')
//            ->join('user', 'articles.user_id', '=', 'user.id')
//            ->select('articles.id','articles.title','articles.body','user.user_name', 'categories.category_name');
        return view('admin.pages.journals.create', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'projects' => Project::all(),
            'peoples' => People::all(),
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
            'description' => 'required',
            'people_id' => 'required',
            'project_id' => 'required',


        ]);

        $journal = new Journal();
        $journal->description = $request->description;
        $journal->people_id = $request->people_id;
        $journal->project_id = $request->project_id;
        $journal->credit = $request->credit;
        $journal->debit = $request->debit;

        $journal->save();

        return redirect()->route('admin.journals.index')->with('success', 'Journal added successfully');
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
    public function edit(Journal $journal)
    {


        return view('admin.pages.journals.edit', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'journal' => $journal
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journal $journal)
    {
        $request->validate([
            'description' => 'required',
            'people_id' => 'required',
            'project_id' => 'required',


        ]);

        $journal->description = $request->description;
        $journal->people_id = $request->people_id;
        $journal->project_id = $request->project_id;
        $journal->credit = $request->credit;
        $journal->debit = $request->debit;

        $journal->save();

        return redirect()->route('admin.journals.index')->with('success', 'Journal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {

        $journal->delete();
        return redirect()->route('admin.journals.index')->with('success', 'Journal deleted successfully');
    }
}
