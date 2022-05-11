<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DynamicProjectController extends Controller
{
    public function index(Request $request)
    {
        // GET THE SLUG, ex. 'posts', 'pages', etc.

        return view('admin.pages.projects.project-dynamic',  [
            'siteInformation' => SiteInformation::first(),
            'projects' => Project::all(),
        ]);



    }


    public function customProjectCreate(Request $request)
    {
        if($request->ajax())  {
            $rules = array(
                'name.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $name = $request->name;
            $place = $request->place;

            for($count = 0; $count < count($name); $count++)
            {
                $data = array(
                    'title' => $name[$count],
                    'place'  => $place[$count],
                    'created_at' =>  date("Y/m/d")
                );
                $insert_data[] = $data;
            }

            Project::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);

        }


    }


}
