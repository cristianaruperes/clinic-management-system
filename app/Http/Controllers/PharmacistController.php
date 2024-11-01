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
use App\User;
use App\RekamMedisRawatInap;
use App\Medicines;

class PharmacistController extends Controller
{
    public function dashboard()
    {
        $patients = Patients::all()->count();
        $users = User::all()->count();
        $recordJalan = RekamMedis::all()->count();
        $recordInap = RekamMedisRawatInap::all()->count();

        return view('admin.pharmacist.dashboard', compact('patients', 'users', 'recordJalan', 'recordInap'));
    }

    public function list()
    {
        $medicines = Medicines::orderBy('nama')->paginate(10);

        return view('admin.pharmacist.list_obat', compact('medicines'));
    }

    public function search()
    {
        $keyword = request()->keyword;

        $medicines = Medicines::paginate(10);

        if (!empty($keyword)) {
            $medicines = Medicines::where('nama', 'LIKE', '%' . $keyword . '%')->orWhere('kode_item', 'LIKE', '%' . $keyword . '%')->paginate(10);
            $medicines->appends(['keyword' => $keyword]);
        }

        return view('admin.pharmacist.list_obat', compact('medicines'));
    }
}
