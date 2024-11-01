<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Patients;
use App\RekamMedisRawatInap;
use App\Doctor;
use App\Room;
use App\GuarantorFamily;
use App\Resep;
use App\ResepRawatInap;
use Carbon\Carbon;

class RekamMedisRawatInapController extends Controller
{
    public function list()
    {
        $patient =  Patients::find(request()->id);
        $records = RekamMedisRawatInap::where('patient_id', $patient->id)->paginate(10);
        $doctors = Doctor::all();
        $rooms = Room::all();

        return view('admin.rekam_medis_rawat_inap.list', compact('patient', 'doctors', 'records', 'rooms'));
    }

    public function delete()
    {
        DB::table('rawat_inap')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'Room is Deleted!');

        return redirect()->back()->with('success', 'Room is deleted!');
    }

    public function save(Request $request)
    {
        if ($request->input('doctor_id') == '') {
            return redirect()->back()->with('success', 'Please select the Doctor');
        }

        if ($request->input('room_id') == '') {
            return redirect()->back()->with('success', 'Please select the Room');
        }

        $doctor = RekamMedisRawatInap::where('doctor_id', $request->input('doctor_id'))->latest()->first();

        $nomor_urut = '1';
        if ($doctor) {
            if (Carbon::parse($doctor->tanggal_pelayanan)->toDateString() == now()->toDateString()) {
                $nomor_urut = $doctor->nomor_urut + 1;
            }
        }

        $data = [
            'rekam_medis_number' => 'RMI' . mt_rand(1000000000, 9999999999),
            'patient_id' => $request->input('patient_id'),
            'doctor_id' => $request->input('doctor_id'),
            'room_id' => $request->input('room_id'),
            'nomor_urut' => $nomor_urut,
            'status' => 'belum selesai',
            'tanggal_pelayanan' => now(),
            'tanggal_pembayaran' => $request->input('tanggal_pembayaran'),
            'tanggal_keluar' => $request->input('tanggal_keluar'),
        ];

        $validator = Validator::make($data, [
            'rekam_medis_number' => 'required|unique:rawat_inap',
            'tanggal_pembayaran' => 'nullable',
            'tanggal_keluar' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->route('list.rekam_medis_rawat_inap.patient')->withErrors($validator)->withInput();
        }

        $doctor = new RekamMedisRawatInap($data);

        if ($doctor->save()) {
            $resep = new ResepRawatInap();
            $resep->rekam_medis_id = $doctor->id;
            $resep->save();

            session()->flash('alert-success', 'New Doctor Added!');
            return redirect()->back()->with('success', 'New Doctor Added!');
        }
        return redirect()->back();
    }

    public function print()
    {
        $record =  RekamMedisRawatInap::find(request()->id);

        return view('admin.rekam_medis_rawat_inap.print', compact('record'));
    }
}
