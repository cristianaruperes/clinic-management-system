<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Patients;
use App\RekamMedis;
use App\Doctor;
use App\GuarantorFamily;
use App\Resep;
use Carbon\Carbon;

class RekamMedisController extends Controller
{
    public function list()
    {
        $patient =  Patients::find(request()->id);
        $records = RekamMedis::where('patient_id', $patient->id)->paginate(10);
        $doctors = Doctor::all();

        return view('admin.rekam_medis.list', compact('patient', 'doctors', 'records'));
    }

    public function delete()
    {
        DB::table('rawat_jalan')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'Doctor is Deleted!');

        return redirect()->back()->with('success', 'Doctor is deleted!');
    }

    public function save(Request $request)
    {
        if ($request->input('doctor_id') == '') {
            return redirect()->back()->with('success', 'Please select the Doctor');
        }

        $doctor = RekamMedis::where('doctor_id', $request->input('doctor_id'))->latest()->first();

        $nomor_urut = '1';
        if ($doctor) {
            if (Carbon::parse($doctor->tanggal_pelayanan)->toDateString() == now()->toDateString()) {
                $nomor_urut = $doctor->nomor_urut + 1;
            }
        }

        $data = [
            'rekam_medis_number' => 'RMJ' . mt_rand(1000000000, 9999999999),
            'patient_id' => $request->input('patient_id'),
            'doctor_id' => $request->input('doctor_id'),
            'nomor_urut' => $nomor_urut,
            'status' => 'belum selesai',
            'tanggal_pelayanan' => now(),
        ];

        $validator = Validator::make($data, [
            'rekam_medis_number' => 'required|unique:rawat_jalan',
        ]);

        if ($validator->fails()) {
            return redirect()->route('list.rekam_medis_rjalan.patient')->withErrors($validator)->withInput();
        }

        $doctor = new RekamMedis($data);

        if ($doctor->save()) {
            $resep = new Resep();
            $resep->rekam_medis_id = $doctor->id;
            $resep->save();

            session()->flash('alert-success', 'New Doctor Added!');
            return redirect()->back()->with('success', 'New Doctor Added!');
        }
        return redirect()->back();
    }

    public function print()
    {
        $record =  RekamMedis::find(request()->id);

        return view('admin.rekam_medis.print', compact('record'));
    }
}
