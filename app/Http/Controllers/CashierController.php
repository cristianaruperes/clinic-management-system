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
use App\GuarantorFamily;
use App\RekamMedis;
use App\User;
use App\RekamMedisRawatInap;

class CashierController extends Controller
{
    public function dashboard()
    {
        $patients = Patients::all()->count();
        $users = User::all()->count();
        $recordJalan = RekamMedis::all()->count();
        $recordInap = RekamMedisRawatInap::all()->count();

        return view('admin.kasir.dashboard', compact('patients', 'users', 'recordJalan', 'recordInap'));
    }

    public function showUnpaidPatient()
    {
        $date = now();
        $rekamJalan = RekamMedis::whereDate('tanggal_pelayanan', $date)->where('status', 'belum selesai')->paginate(10);
        $rekamInap = RekamMedisRawatInap::whereDate('tanggal_pelayanan', $date)->orWhere('status', 'belum selesai')->paginate(3);

        return view('admin.cashier.list_unpaid_patient', compact('rekamJalan', 'rekamInap', 'date'));
    }

    public function dateRekamMedis()
    {
        $date = request()->date;
        $rekamJalan = RekamMedis::whereDate('tanggal_pelayanan', $date)->paginate(10);
        $rekamInap = RekamMedisRawatInap::whereDate('tanggal_pelayanan', $date)->orWhere('status', 'belum selesai')->paginate(3);

        return view('admin.cashier.list_unpaid_patient', compact('rekamJalan', 'rekamInap', 'date'));
    }

    public function show()
    {
        $patients = Patients::orderBy('name')->paginate(10);

        return view('admin.cashier.list_patient', compact('patients'));
    }

    public function add()
    {
        return view('admin.cashier.add_service');
    }

    public function edit()
    {
        $service = DB::table('services')->find(request()->id);

        return view('admin.cashier.edit_service', compact('service'));
    }

    public function showServices()
    {
        $services = Services::paginate(10);

        return view('admin.cashier.list_service_price', compact('services'));
    }

    public function searchPatient()
    {
        $keyword = request()->keyword;

        $patients = Patients::paginate(10);

        if (!empty($keyword)) {
            $patients = Patients::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('patient_number', 'LIKE', '%' . $keyword . '%')->paginate(10);
            $patients->appends(['keyword' => $keyword]);
        }

        return view('admin.cashier.list_patient', compact('patients'));
    }

    public function search()
    {
        $keyword = request()->keyword;

        $services = Services::paginate(10);

        if (!empty($keyword)) {
            $services = Services::where('name', 'LIKE', '%' . $keyword . '%')->paginate(10);
            $services->appends(['keyword' => $keyword]);
        }

        return view('admin.cashier.list_service_price', compact('services'));
    }

    public function save(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ];

        $validator = Validator::make($data, [
            'name' => 'required|unique:services',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('add.cashier.service')->withErrors($validator)->withInput();
        }

        $service = new Services($data);

        if ($service->save()) {
            session()->flash('alert-success', 'New Service Created!');
            return redirect()->route('show.cashier.service');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $array = collect($request->all());
        $collect = $array->except(['_token', 'id']);
        $collect = $collect->toArray();

        if (DB::table('services')->where('id', $request->input('id'))->update($collect)) {
            session()->flash('alert-success', 'Service is Updated!');
            return redirect()->route('show.cashier.service');
        }
        return redirect()->back();
    }

    public function delete()
    {
        DB::table('services')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'Service is Deleted!');
        return redirect()->route('show.cashier.service');
    }

    // Rekam Medis Rawat Jalan
    public function rekamMedis()
    {
        $patient =  Patients::find(request()->id);
        $records = RekamMedis::where('patient_id', $patient->id)->paginate(10);
        $doctors = Doctor::all();

        return view('admin.cashier.list_rekam_medis_patient', compact('patient', 'doctors', 'records'));
    }
    // End Rekam Medis Rawat Jalan

    // Rekam Medis Rawat Inap
    public function rekamMedisRawatInap()
    {
        $patient =  Patients::find(request()->id);
        $records = RekamMedisRawatInap::where('patient_id', $patient->id)->paginate(10);
        $doctors = Doctor::all();

        return view('admin.cashier.rawat_inap.list_rekam_medis_patient', compact('patient', 'doctors', 'records'));
    }
    // End Rekam Medis Rawat Inap
}
