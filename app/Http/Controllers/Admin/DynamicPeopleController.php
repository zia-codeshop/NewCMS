<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\People;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class DynamicPeopleController extends Controller
{
    public function index(){
        return view('admin.pages.people.people-dynamic', [
            'siteInformation' => SiteInformation::first()

        ]);
    }


    public function customPeopleCreate(Request $request)
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
            $contact = $request->contact;
            $address = $request->address;

            for($count = 0; $count < count($name); $count++)
            {
                $data = array(
                    'name' => $name[$count],
                    'contact'  => $contact[$count],
                    'address'  => $address[$count],
                    'created_at' =>  date("Y/m/d")
                );
                $insert_data[] = $data;
            }

            People::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);



        }
        return redirect()->route('admin.peoples.index');
    }
}
