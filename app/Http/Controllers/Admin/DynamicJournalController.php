<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cdr;
use App\Models\Project;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DynamicJournalController extends Controller
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

    public function project_wise_report(){
        $projects = DB::table('projects as p')
            ->join('cdrs as c',  'p.id', '=', 'c.project_id')
            ->select('p.id', 'p.title')
            ->where('c.status', '=', 'win')
            ->whereNull('p.deleted_at')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('journals as j')
                    ->whereColumn('p.id', 'j.project_id');
            })
            ->get();


//           $projects = DB::table('projects as p')
//
//                ->join('cdrs as c',  'p.id', '=', 'c.project_id')
//                ->select('p.id', 'p.title')
//                ->where('c.status', '=', 'win')
//                ->whereNull('p.deleted_at')
//                ->get();
//
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $status = request()->input('status_box');

            $datas = DB::table('journals as j')
                ->join('peoples as p',  'j.people_id', '=', 'p.id')
                ->join('projects as pr',  'j.project_id', '=', 'pr.id')
                ->select('j.id', 'j.description', 'p.name', 'pr.title', 'j.debit', 'j.credit', 'j.created_at')
                ->where('pr.id', '=', $status)
                ->whereNull('p.deleted_at')
                ->whereBetween(DB::raw('DATE(j.created_at)'),[$start_date,$end_date])
                ->get();

            $sums = DB::table('journals as j')
                ->join('projects as pr',  'j.project_id', '=', 'pr.id')
                ->selectRaw('sum(j.debit) as summary_debit')
                ->selectRaw('sum(j.credit) as summary_credit')
                ->selectRaw('sum(j.debit) - sum(j.credit) as net_amount') //dont you want this the other way round?
                ->where('pr.id', '=', $status)
                ->whereBetween(DB::raw('DATE(j.created_at)'),[$start_date,$end_date])
                ->whereNull('j.deleted_at')
                ->get();
        } else {
            $datas = "No data found";
            $sums = 'No';

        }

        return view ('admin.pages.journals.project-report')
            ->with(['projects' => ($projects)])
            ->with(['datas' => ($datas)])
            ->with(['sums' => ($sums)])
            ->with(['siteInformation' => (SiteInformation::first())]);

    }
}
