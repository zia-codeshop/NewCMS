<?php

namespace App\Http\Controllers;

use App\Models\Cdr;
use App\Models\SiteInformation;
use App\Models\User;


class ReleaseCdrController extends Controller
{
    //
    public function index(){
        return view('admin.pages.cdrs.release-cdr', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
            'cdrs' => Cdr::where('status', '=', 'release')->orderBy('id', 'DESC')->get(),

        ]);
    }

    public function release($id){

        $status = Cdr::select('status')->where('id','=', $id)->first();

        if ($status->status == 'pending'){
            Cdr::where('id', $id)->update(array('status' => 'release'));
            return redirect()->back();

        }
        else{
            return redirect()->back();
        }
    }
}
