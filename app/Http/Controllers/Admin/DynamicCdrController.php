<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cdr;
use App\Models\Project;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DynamicCdrController extends Controller
{
    public function index(Request $request)
    {
        // GET THE SLUG, ex. 'posts', 'pages', etc.

        return view('admin.pages.cdrs.cdr-dynamic',  [
            'siteInformation' => SiteInformation::first(),
            'projects' => Project::all(),
        ]);



    }


    public function customCdrCreate(Request $request)
    {
        if($request->ajax())  {
            $rules = array(
                'account_holder.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $account_holder = $request->account_holder;
            $amount = $request->amount;
            $ref_no = $request->ref_no;
            $cdr_no = $request->cdr_no;
            $project = $request->project;

            for($count = 0; $count < count($account_holder); $count++)
            {
                $data = array(
                    'account_holder' => $account_holder[$count],
                    'amount'  => $amount[$count],
                    'ref_no'  => $ref_no[$count],
                    'cdr_no'  => $cdr_no[$count],
                    'project'  => $project[$count],
                    'status'  => 'pending',
                    'created_at' =>  date("Y/m/d")
                );
                $insert_data[] = $data;
            }

            Cdr::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);

        }
    }
}
