<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use Hash;
use Auth;

class DoctorController extends Controller
{
    public function list()
    {
        $doctors = Doctor::select('id', 'doctor_number', 'name', 'email')->orderBy('name')->paginate(10);

        return view('admin.doctor.list_doctor', compact('doctors'));
    }

    public function add()
    {
        return view('admin.doctor.add_doctor');
    }

    public function edit()
    {
        $doctor =  Doctor::find(request()->id);

        return view('admin.doctor.edit_doctor', compact('doctor'));
    }

    public function update(Request $request)
    {
        $array = collect($request->all());
        $collect = $array->except(['_token', 'id']);
        $collect = $collect->toArray();

        if (DB::table('doctors')->where('id', $request->input('id'))->update($collect)) {
            session()->flash('alert-success', 'Dokter sudah diupdate!');
            return redirect()->route('list.doctor');
        }
        return redirect()->back();
    }

    public function delete()
    {
        DB::table('doctors')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'Doctor is Deleted!');
        return redirect()->route('list.doctor');
    }

    public function save(Request $request)
    {
        $data = [
            'doctor_number' => 'DR' . mt_rand(1000000000, 9999999999),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        $validator = Validator::make($data, [
            'name' => 'required|unique:doctors',
            'email' => 'required|unique:doctors',
            'doctor_number' => 'required|unique:doctors',
        ]);

        if ($validator->fails()) {
            return redirect()->route('add.doctor')->withErrors($validator)->withInput();
        }

        $doctor = new Doctor($data);

        if ($doctor->save()) {
            session()->flash('alert-success', 'New Doctor Created!');
            return redirect()->route('list.doctor');
        }
        return redirect()->back();
    }
}
