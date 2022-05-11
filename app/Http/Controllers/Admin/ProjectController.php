<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Project;
use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.projects.index', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'projects' => Project::orderBy('id', 'DESC')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.projects.create', [
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
            'title' => 'required',
            'place' => 'required',

        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->place = $request->place;

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project added successfully');
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
    public function edit(Project $project)
    {


        return view('admin.pages.projects.edit', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'project' => $project
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'place' => 'required',
        ]);


        $project->title = $request->title;
        $project->place = $request->place;

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }
}
