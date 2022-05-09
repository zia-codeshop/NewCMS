<?php

namespace App\Http\Controllers;

use App\Models\Cdr;
use App\Models\Project;
use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Http\Request;

class WinCdrController extends Controller
{

    public function index()
    {

        return view('admin.pages.cdrs.win-cdr', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'cdrs' => Cdr::where('status', '=', 'win')->orderBy('id', 'DESC')->get(),

        ]);
    }

    public function win($id){
//        $name = Cdr::find($id);


        $status = Cdr::select('status')->where('id','=', $id)->first();

        if ($status->status == 'pending'){
            Cdr::where('id', $id)->update(array('status' => 'win'));
            $name = Cdr::select('project')->where('id','=', $id)->first();

            $data = array(
                'title' => $name->project,
                'place'  => '',
                'created_at' =>  date("Y/m/d")
            );
            $insert_data[] = $data;
            Project::insert($insert_data);
            $project_id = Project::select('id')->where('title','=',  $name->project)->orderby('id', 'desc')->first();

            Cdr::where('id', $id)->update(array( 'project_id' => $project_id->id));
            return redirect()->back();

        }
        else{
            return redirect()->back();
        }

    }
}
