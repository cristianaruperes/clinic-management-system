<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Patients;
use App\Doctor;
use App\Exports\PatientsExport;
use App\GuarantorFamily;
use App\Resep;
use App\RekamMedis;
use App\RekamMedisRawatInap;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationController extends Controller
{
    public function show()
    {
        $patients = Patients::orderBy('name')->paginate(10);

        return view('admin.registration.list_patient', compact('patients'));
    }

    public function rekamMedis()
    {
        $date = now();
        $rekamJalan = RekamMedis::whereDate('tanggal_pelayanan', $date)->where('status', 'belum selesai')->paginate(10);
        $rekamInap = RekamMedisRawatInap::whereDate('tanggal_pelayanan', $date)->orWhere('status', 'belum selesai')->paginate(10);

        return view('admin.registration.rekam_medis', compact('rekamJalan', 'rekamInap', 'date'));
    }

    public function dateRekamMedis()
    {
        $date = request()->date;
        $rekamJalan = RekamMedis::whereDate('tanggal_pelayanan', $date)->paginate(10);
        $rekamInap = RekamMedisRawatInap::whereDate('tanggal_pelayanan', $date)->orWhere('status', 'belum selesai')->paginate(10);

        return view('admin.registration.rekam_medis', compact('rekamJalan', 'rekamInap', 'date'));
    }

    public function edit()
    {
        $patient =  Patients::find(request()->id);

        return view('admin.registration.edit_patient', compact('patient'));
    }

    public function form()
    {
        return view('admin.registration.add_patient');
    }

    public function delete()
    {
        DB::table('patients')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'User is Deleted!');
        return redirect()->route('show.patient');
    }

    public function search()
    {
        $keyword = request()->keyword;

        $patients = Patients::paginate(10);

        if (!empty($keyword)) {
            $patients = Patients::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('patient_number', 'LIKE', '%' . $keyword . '%')->paginate(10);
            $patients->appends(['keyword' => $keyword]);
        }

        return view('admin.registration.list_patient', compact('patients'));
    }

    public function printForm()
    {
        $patient =  Patients::find(request()->id);

        return view('admin.registration.print', compact('patient'));
    }

    public function update(Request $request)
    {
        $data =
            [
                'patient_number' => 'PN' . mt_rand(1000000000, 9999999999),
                'name' => $request->input('patient-fullname'),
                'id_card_number' => $request->input('patient-id-card'),
                'id_card' => $request->input('patient-card'),
                'patient_father_name' => $request->input('patient-father-name'),

                'jalan' => $request->input('patient-jalan'),
                'kelurahan' => $request->input('patient-kelurahan'),
                'kecamatan' => $request->input('patient-kecamatan'),
                'city' => $request->input('patient-city'),
                'postal_code' => $request->input('patient-postal-code'),
                'residence' => $request->input('patient-residence'),

                'home_phone_number' => $request->input('patient-home-phone-number'),
                'handphone_phone_number' => $request->input('patient-handphone-phone-number'),
                'office_phone_number' => $request->input('patient-office-phone-number'),
                'fax_phone_number' => $request->input('patient-fax-phone-number'),
                'wa_phone_number' => $request->input('patient-wa-phone-number'),

                'golongan_darah' => $request->input('patient-golongan-darah'),
                'placeOfBirth' => $request->input('patient-placeOfBirth'),
                'dateOfBirth' => $request->input('patient-dateOfBirth'),
                'sex' => $request->input('patient-sex'),
                'marrital_status' => $request->input('patient-marrital-status'),
                'religion' => $request->input('patient-religion'),

                'email' => $request->input('patient-email'),
                'nationality' => $request->input('patient-nationality'),
                'tribe' => $request->input('patient-tribe'),
                'language' => $request->input('patient-language'),
                'occupation' => $request->input('patient-occupation'),

                'clinic_info' => $request->input('patient-get-info'),
            ];

        $dataFamily =
            [
                'name' => $request->input('family-full-name'),
                'relation_with_patient' => $request->input('family-relation'),

                'jalan' => $request->input('family-jalan'),
                'kelurahan' => $request->input('family-kelurahan'),
                'kecamatan' => $request->input('family-kecamatan'),
                'city' => $request->input('family-city'),
                'postal_code' => $request->input('family-postal-code'),
                'residence' => $request->input('family-residence'),

                'home_phone_number' => $request->input('family-home-phone-number'),
                'handphone_phone_number' => $request->input('family-handphone-phone-number'),
                'office_phone_number' => $request->input('family-office-phone-number'),
                'fax_phone_number' => $request->input('family-fax-phone-number'),
                'wa_phone_number' => $request->input('family-wa-phone-number'),

                'assurance' => $request->input('family-assurance'),
            ];

        $validator = Validator::make($data, [
            'name' => 'required',
            'patient_number' => 'required|unique:patients',
        ]);

        $validatorFamily = Validator::make($dataFamily, [
            'name' => 'required',
        ]);

        if ($validator->fails() || $validatorFamily->fails()) {
            return redirect()->back()->withErrors($validator->errors()->merge($validatorFamily->errors()))->withInput();
        }

        $patient = Patients::find($request->input('id'));
        $patient->update($data);

        if (empty($patient->family)) {
            $dataFamily['patient_id'] = $patient->id;
            $family = new GuarantorFamily($dataFamily);
            $family->save();
            return redirect()->route('show.patient');
        }


        if ($patient->family->update($dataFamily)) {
            session()->flash('alert-success', 'New User Created!');
            return redirect()->route('show.patient');
        }
        return redirect()->back();
    }

    public function save(Request $request)
    {
        // patient_number_sequent
        // $patient = DB::table('patients')->latest()->first();
        // $lastDigit = substr($patient->patient_number_sequent, -4);

        // $input = $lastDigit+1;
        // $year = date("y");
        // $digit = str_pad($input, 4, "0", STR_PAD_LEFT);
        // $fullNumber = $year.$digit;

        $data =
            [
                'patient_number' => 'PN' . mt_rand(1000000000, 9999999999),
                // 'patient_number_sequent' => $fullNumber,
                'name' => $request->input('patient-fullname'),
                'id_card_number' => $request->input('patient-id-card'),
                'id_card' => $request->input('patient-card'),
                'patient_father_name' => $request->input('patient-father-name'),

                'jalan' => $request->input('patient-jalan'),
                'kelurahan' => $request->input('patient-kelurahan'),
                'kecamatan' => $request->input('patient-kecamatan'),
                'city' => $request->input('patient-city'),
                'postal_code' => $request->input('patient-postal-code'),
                'residence' => $request->input('patient-residence'),

                'home_phone_number' => $request->input('patient-home-phone-number'),
                'handphone_phone_number' => $request->input('patient-handphone-phone-number'),
                'office_phone_number' => $request->input('patient-office-phone-number'),
                'fax_phone_number' => $request->input('patient-fax-phone-number'),
                'wa_phone_number' => $request->input('patient-wa-phone-number'),

                'golongan_darah' => $request->input('patient-golongan-darah'),
                'placeOfBirth' => $request->input('patient-placeOfBirth'),
                'dateOfBirth' => $request->input('patient-dateOfBirth'),
                'sex' => $request->input('patient-sex'),
                'marrital_status' => $request->input('patient-marrital-status'),
                'religion' => $request->input('patient-religion'),

                'email' => $request->input('patient-email'),
                'nationality' => $request->input('patient-nationality'),
                'tribe' => $request->input('patient-tribe'),
                'language' => $request->input('patient-language'),
                'occupation' => $request->input('patient-occupation'),

                'clinic_info' => $request->input('patient-get-info'),
            ];

        $dataFamily =
            [
                'name' => $request->input('family-full-name'),
                'relation_with_patient' => $request->input('family-relation'),

                'jalan' => $request->input('family-jalan'),
                'kelurahan' => $request->input('family-kelurahan'),
                'kecamatan' => $request->input('family-kecamatan'),
                'city' => $request->input('family-city'),
                'postal_code' => $request->input('family-postal-code'),
                'residence' => $request->input('family-residence'),

                'id_card_number' => $request->input('family-id-card-number'),
                'id_card' => $request->input('family-card'),

                'home_phone_number' => $request->input('family-home-phone-number'),
                'handphone_phone_number' => $request->input('family-handphone-phone-number'),
                'office_phone_number' => $request->input('family-office-phone-number'),
                'fax_phone_number' => $request->input('family-fax-phone-number'),
                'wa_phone_number' => $request->input('family-wa-phone-number'),

                'assurance' => $request->input('family-assurance'),
            ];


        $validator = Validator::make($data, [
            'name' => 'required',
            'patient_number' => 'required|unique:patients',
        ]);

        $validatorFamily = Validator::make($dataFamily, [
            'name' => 'required',
        ]);

        if ($validator->fails() || $validatorFamily->fails()) {
            return redirect()->route('form.patient')->withErrors($validator->errors()->merge($validatorFamily->errors()))->withInput();
        }

        $patient = new Patients($data);

        if (!$patient->save()) {
            return redirect()->back();
        }

        $patient->save();

        $dataFamily['patient_id'] = $patient->id;
        $family = new GuarantorFamily($dataFamily);

        if ($family->save()) {
            session()->flash('alert-success', 'New User Created!');
            return redirect()->route('show.patient');
        }
        return redirect()->back();
    }

    public function exportPatients()
    {
        return Excel::download(new PatientsExport, 'DataPasien-'.now()->format('d-m-Y').'.xlsx');
    }
}
