<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use Hash;

class SettingsController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('admin.settings.profile', compact('user'));
    }
    public function editProfile()
    {
        $user = DB::table('users')->find(request()->id);

        return view('admin.settings.edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $array = collect($request->all());
        $array['password'] = Hash::make($request->input('password'));
        $$array['access_level'] = Auth::user()->access_level;
        $collect = $array->except(['_token', 'id']);
        $collect = $collect->toArray();

        if (DB::table('users')->where('id', $request->input('id'))->update($collect)) {
            session()->flash('alert-success', 'Data telah di update!');
            return redirect()->back()->with('success' , 'data telah di update');
        }
        return redirect()->back();
    }

    public function auditLogs()
    {
        return view('admin.settings.audit_logs');
    }
    public function uploadLogo()
    {
        return view('admin.settings.upload_logo');
    }

}
