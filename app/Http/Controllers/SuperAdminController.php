<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Patients;
use App\Doctor;
use App\Services;
use App\Payment;
use App\GuarantorFamily;
use App\RekamMedis;
use App\RekamMedisRawatInap;
use App\User;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $patients = Patients::all()->count();
        $users = User::all()->count();
        $recordJalan = RekamMedis::all()->count();
        $recordInap = RekamMedisRawatInap::all()->count();

        return view('admin.superadmin.dashboard', compact('patients', 'users', 'recordJalan', 'recordInap'));
    }
}
