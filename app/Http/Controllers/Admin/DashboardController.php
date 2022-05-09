<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function welcome(){
        $setting = SiteInformation::first();
        return view('welcome', [
            'setting' => SiteInformation::first(),
        ]);
    }

    public function index()
    {

        return view('admin.pages.dashbaord',[
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
        ]);

    }


    public function profile(User $user)
    {

        return view('admin.pages.profile', [
            'user' => $user,
            'siteInformation' => SiteInformation::first(),
        ]);

    }

    public function siteInformation()
    {

        return view('admin.pages.siteInformation',[
            'user' => User::where('id', auth()->user()->id)->first(),
            'siteInformation' => SiteInformation::first(),
        ]);

    }

    public function profileUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'image' => 'sometimes|max:1024'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
//        $user->facebook = $request->facebook;
//        $user->linkedin = $request->linkedin;
//        $user->instagram = $request->instagram;

        if($request->image)
        {
            File::delete(public_path('storage/'.$user->image));
            $user->image = $request->image->store('users/', 'public');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function passwordChange(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|same:confirm_password|different:old_password',
            'confirm_password' => 'required',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            $request->session()->flash('success', 'Password changed');

        } else {
            $request->session()->flash('error', 'Old password not matched');
        }
        return redirect()->back();
    }

    public function logosUpdate(Request $request)
    {
        $request->validate([
            'agency_logo' => 'sometimes|max:value:1024',
            'agency_logo_inverse' => 'sometimes|max:value:1024',
        ]);

        $siteInformation = SiteInformation::first();

        if($siteInformation)
        {
            if($request->agency_logo)
            {
                File::delete(public_path('storage/'.$siteInformation->agency_logo));
                $siteInformation->agency_logo = $request->agency_logo->store('site/', 'public');
            }

            if($request->agency_logo_inverse)
            {
                File::delete(public_path('storage/'.$siteInformation->agency_logo_inverse));
                $siteInformation->agency_logo_inverse = $request->agency_logo_inverse->store('site/', 'public');
            }
        }
        else{
            $siteInformation = new SiteInformation();
        }

        $siteInformation->agency_logo = $request->agency_logo->store('site/', 'public');
        $siteInformation->agency_logo_inverse = $request->agency_logo_inverse->store('site/', 'public');

        $siteInformation->save();

        return redirect()->back()->with('success', 'Logo(s) updated successfully');
    }

    public function siteInformationUpdate(Request $request)
    {
        $request->validate([
            'agency_name' => 'required',
            'agency_email' => 'required|email',
            'agency_phone' => 'required|numeric',
            'agency_address' => 'required',
            'agency_privacy_policy' => 'required',
            'agency_terms_and_conditions' => 'required',
        ]);

        $siteInformation = SiteInformation::first();

        if(!$siteInformation)
            $siteInformation = new SiteInformation();

        $siteInformation->agency_name = $request->agency_name;
        $siteInformation->agency_email = $request->agency_email;
        $siteInformation->agency_phone = $request->agency_phone;
        $siteInformation->agency_address = $request->agency_address;
        $siteInformation->agency_twitter = $request->agency_twitter;
        $siteInformation->agency_facebook = $request->agency_facebook;
        $siteInformation->agency_linkedin = $request->agency_linkedin;
        $siteInformation->agency_instagram = $request->agency_instagram;
        $siteInformation->agency_youtube = $request->agency_youtube;
        $siteInformation->agency_privacy_policy = $request->agency_privacy_policy;
        $siteInformation->agency_terms_and_conditions = $request->agency_terms_and_conditions;

        $siteInformation->save();

        return redirect()->back()->with('success', 'Site Information updated successfully');
    }
}
